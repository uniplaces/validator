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

use EBT\Validator\ValidatorCollection;

/**
 * ValidatorCollectionTest
 */
class ValidatorCollectionTest extends TestCase
{
    /**
     * @param mixed $value
     * @param array $choices
     * @param bool  $expected
     *
     * @dataProvider providerChoices
     */
    public function testInChoice($value, array $choices, $expected)
    {
        $this->assertEquals($expected, ValidatorCollection::inChoice($value, $choices));
    }

    /**
     * @return array
     */
    public function providerChoices()
    {
        return array(
            // value, choices, expected
            array(10, array(10, 20), true),
            array(5, array(10, 20), false),
            array(5, array(10, 20), false),
        );
    }

    public function testInChoiceCallback()
    {
        $this->assertTrue(
            ValidatorCollection::inChoiceCallback(
                10,
                function () {
                    return array(10, 20);
                }
            )
        );

        $this->assertFalse(
            ValidatorCollection::inChoiceCallback(
                10,
                function () {
                    return array(30, 20);
                }
            )
        );
    }

    /**
     * @param mixed $value
     * @param int   $min
     * @param int   $max
     * @param bool  $expected
     *
     * @dataProvider providerCounts
     */
    public function testInCountRange($value, $min, $max, $expected)
    {
        $this->assertEquals($expected, ValidatorCollection::inCountRange($value, $min, $max));
    }

    /**
     * @return array
     */
    public function providerCounts()
    {
        return array(
            // value, min, max, expected
            array(array(1, 2, 3), 2, null, true),
            array(array(1, 2, 3), null, 5, true),
            array(array(1, 2, 3), 2, 5, true),
            array(array(1, 2, 3), 5, null, false),
            array(array(1, 2, 3), 1, 2, false)
        );
    }
}
