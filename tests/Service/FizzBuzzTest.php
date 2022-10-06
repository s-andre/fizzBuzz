<?php

namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\Service\FizzBuzz;
use RangeException;

class FizzBuzzTest extends TestCase
{
    private FizzBuzz $fizzBuzz;

    public function setUp(): void
    {
        $this->fizzBuzz = new FizzBuzz();
    }

    /**
     * @dataProvider validRanges
     */
    public function testItPrintsProperQtt($ranges): void
    {
        foreach ($ranges as $range) {
            $rangeSize = $range['end'] - $range['start'] + 1;
            $result    = $this->fizzBuzz->print($range['start'], $range['end']);

            $this->assertTrue($rangeSize == count($result));
        }
    }

    /**
     * @dataProvider validRanges
     */
    public function testItPrintsExpectedValue($ranges): void
    {
        foreach ($ranges as $range) {
            $result = $this->fizzBuzz->print($range['start'], $range['end']);
            $this->assertEquals($result, $range['expectedOutput']);
        }
    }

    /**
     * @dataProvider invalidRanges
     */
    public function testItThrowsExceptionForInvalidRanges($ranges): void
    {
        $this->expectException(RangeException::class);
        foreach ($ranges as $range) {
            $this->fizzBuzz->print($range['start'], $range['end']);
        }
    }

    public function validRanges(): array
    {
        return [
            [
                [
                    [
                        'start' => 1,
                        'end' => 30,
                        'expectedOutput' => [
                            1,
                            2,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_3,
                            4,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_5,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_3,
                            7,
                            8,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_3,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_5,
                            11,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_3,
                            13,
                            14,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_3 . FizzBuzz::OUTPUT_MULTIPLES_OF_5,
                            16,
                            17,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_3,
                            19,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_5,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_3,
                            22,
                            23,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_3,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_5,
                            26,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_3,
                            28,
                            29,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_3 . FizzBuzz::OUTPUT_MULTIPLES_OF_5,
                        ]
                    ],
                    [
                        'start' => -10,
                        'end' => 5,
                        'expectedOutput' => [
                            FizzBuzz::OUTPUT_MULTIPLES_OF_5,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_3,
                            -8,
                            -7,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_3,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_5,
                            -4,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_3,
                            -2,
                            -1,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_3 . FizzBuzz::OUTPUT_MULTIPLES_OF_5,
                            1,
                            2,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_3,
                            4,
                            FizzBuzz::OUTPUT_MULTIPLES_OF_5
                        ]
                    ],
                ]
            ]
        ];
    }

    public function invalidRanges(): array
    {
        return [
            [
                [
                    [
                        'start' => 300,
                        'end' => 250
                    ],
                    [
                        'start' => -10,
                        'end' => -20
                    ],
                ]
            ]
        ];
    }
}
