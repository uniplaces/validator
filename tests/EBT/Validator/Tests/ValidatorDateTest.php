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

use EBT\Validator\ValidatorDate;

/**
 * ValidatorDateTest
 */
class ValidatorDateTest extends TestCase
{
    /**
     * @param mixed  $value
     * @param bool   $expected
     * @param string $exception
     *
     * @dataProvider providerDates
     */
    public function testIsDate($value, $expected, $exception = null)
    {
        if ($exception !== null) {
            $this->setExpectedException($exception);
        }

        $this->assertEquals($expected, ValidatorDate::isDate($value));
    }

    /**
     * @return array
     */
    public function providerDates()
    {
        return array(
            // value. expected, exception
            array('1999-03-05', true),
            array('1999-03-39', false),
            array('1999-13-39', false),
            array(new \DateTime(), true),
            array('1999-03-05 21:10:10', false),
            array(array(), false, 'Symfony\Component\Validator\Exception\UnexpectedTypeException')
        );
    }

    /**
     * @param mixed  $value
     * @param bool   $expected
     * @param string $exception
     *
     * @dataProvider providerDateTimes
     */
    public function testIsDateTime($value, $expected, $exception = null)
    {
        if ($exception !== null) {
            $this->setExpectedException($exception);
        }

        $this->assertEquals($expected, ValidatorDate::isDateTime($value));
    }

    /**
     * @return array
     */
    public function providerDateTimes()
    {
        return array(
            // value. expected, exception
            array('1999-03-05 21:10:10', true),
            array('1999-03-05', false),
            array(new \DateTime(), true),
            array(array(), false, 'Symfony\Component\Validator\Exception\UnexpectedTypeException')
        );
    }

    /**
     * @param mixed  $value
     * @param bool   $expected
     * @param string $exception
     *
     * @dataProvider providerTimes
     */
    public function testIsTime($value, $expected, $exception = null)
    {
        if ($exception !== null) {
            $this->setExpectedException($exception);
        }

        $this->assertEquals($expected, ValidatorDate::isTime($value));
    }

    /**
     * @return array
     */
    public function providerTimes()
    {
        return array(
            // value. expected, exception
            array('1999-03-05 21:10:10', false),
            array('21:10:10', true),
            array('1999-03-05', false),
            array(new \DateTime(), true),
            array(array(), false, 'Symfony\Component\Validator\Exception\UnexpectedTypeException')
        );
    }
}
