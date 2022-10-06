<?php
declare(strict_types=1);

namespace App\Service;

use RangeException;

class FizzBuzz
{
    public const DEFAULT_RANGE_START         = 1;
    public const DEFAULT_RANGE_END           = 100;
    public const OUTPUT_MULTIPLES_OF_3       = 'Fizz';
    public const OUTPUT_MULTIPLES_OF_5       = 'Buzz';
    public const ERROR_MESSAGE_INVALID_RANGE = 'The start range should be higher than the end range.';

    /**
     * Prints the numbers from 1 to 100
     * But for multiples of three print Fizz instead of the number and for the multiples of five print Buzz
     * For numbers which are multiples of both three and five print FizzBuzz
     *
     * @param int $start
     * @param int $end
     *
     * @return array
     * @throws RangeException
     */
    public function print(int $start = self::DEFAULT_RANGE_START, int $end = self::DEFAULT_RANGE_END): array
    {
        if ($end < $start) {
            throw new RangeException(self::ERROR_MESSAGE_INVALID_RANGE);
        }

        $ret = [];

        for ($number = $start; $number <= $end; $number++) {
            $ret[] = $this->getOutput($number);
        }

        return $ret;
    }

    /**
     * Calculates the output based on the multiples
     *
     * @param int $number
     * @return string|int
     */
    protected function getOutput(int $number): string|int
    {
        $outputString = '';
        if ($number % 3 == 0) {
            $outputString .= self::OUTPUT_MULTIPLES_OF_3;
        }
        if ($number % 5 == 0) {
            $outputString .= self::OUTPUT_MULTIPLES_OF_5;
        }

        if (!empty($outputString)) {
            return $outputString;
        }

        return $number;
    }
}