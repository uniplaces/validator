<?php

/*
 * This file is a part of the Validator library.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\Validator\Tests;

use EBT\Validator\ValidatorNumber;

/**
 * ValidatorNumberTest
 */
class ValidatorNumberTest extends TestCase
{
    /**
     * @param mixed     $value
     * @param int|float $min
     * @param int|float $max
     * @param bool      $expected
     *
     * @dataProvider providerRanges
     */
    public function testInRange($value, $min, $max, $expected)
    {
        $this->assertEquals($expected, ValidatorNumber::inRange($value, $min, $max));
    }

    /**
     * @return array
     */
    public function providerRanges()
    {
        return array(
            // value, min, max, expected,
            array(10, 5, 30, true),
            array(10, 20, 30, false),
            array(40, 20, 30, false),
            array(7.5, 2.5, 8, true)
        );
    }
}
