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

use EBT\Validator\ValidatorString;

/**
 * ValidatorStringTest
 */
class ValidatorStringTest extends TestCase
{
    /**
     * @param mixed  $value
     * @param bool   $expected
     * @param int    $violationsCount
     * @param string $exception
     *
     * @dataProvider providerEmails
     */
    public function testIsEmail($value, $expected, $violationsCount, $exception = null)
    {
        if ($exception !== null) {
            $this->setExpectedException($exception);
        }

        $this->assertEquals($expected, ValidatorString::isEmail($value));
        $this->assertCount($violationsCount, ValidatorString::getViolations());
    }

    /**
     * @return array
     */
    public function providerEmails()
    {
        return array(
            // value, expected, violations count, exception
            array('john.doe@gmail.com', true, 0),
            array('test', false, 1),
            array(array(), false, null, 'Symfony\Component\Validator\Exception\UnexpectedTypeException'),
            array(new \DateTime(), false, null, 'Symfony\Component\Validator\Exception\UnexpectedTypeException')
        );
    }

    /**
     * @param mixed  $value
     * @param int    $min
     * @param int    $max
     * @param bool   $expected
     * @param int    $violationsCount
     * @param string $exception
     *
     * @dataProvider providerLengths
     */
    public function testIsLength(
        $value,
        $min = null,
        $max = null,
        $expected = true,
        $violationsCount = 0,
        $exception = null
    ) {
        if ($exception !== null) {
            $this->setExpectedException($exception);
        }

        $this->assertEquals($expected, ValidatorString::isLength($value, $min, $max));
        $this->assertCount($violationsCount, ValidatorString::getViolations());
    }

    /**
     * @return array
     */
    public function providerLengths()
    {
        return array(
            // value, min, max, expected, violations count, exception
            array('test', 2, 10, true, 0),
            array(array(), 2, 10, null, 0, 'Symfony\Component\Validator\Exception\UnexpectedTypeException'),
            array('test', null, null, null, 0, 'Symfony\Component\Validator\Exception\MissingOptionsException'),
        );
    }
}
