<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Service\FizzBuzz;

#[AsCommand(
    name: 'print-numbers-fizz-buzz',
    description: 'Prints the integer numbers from start to end range.',
)]
class PrintNumbersFizzBuzzCommand extends Command
{
    private FizzBuzz $fizzBuzz;

    public function __construct(FizzBuzz $fizzBuzz)
    {
        parent::__construct();

        $this->fizzBuzz = $fizzBuzz;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('start', InputArgument::OPTIONAL, 'Integer start range')
            ->addArgument('end', InputArgument::OPTIONAL, 'Integer end range');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io    = new SymfonyStyle($input, $output);
        $start = $input->getArgument('start') ?? FizzBuzz::DEFAULT_RANGE_START;
        $end   = $input->getArgument('end') ?? FizzBuzz::DEFAULT_RANGE_END;

        $result = $this->fizzBuzz->print($start, $end);

        $io->success($result);

        return Command::SUCCESS;
    }
}
