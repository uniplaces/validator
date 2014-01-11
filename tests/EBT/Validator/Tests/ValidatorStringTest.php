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

    public function testIsUrl()
    {
        $this->assertFalse(ValidatorString::isUrl('test', array('message' => 'Invalid URL.')));
        $this->assertContains('test: Invalid URL.', ValidatorString::getViolationsAsShortString());

        $this->assertTrue(ValidatorString::isUrl('http://www.google.pt'));
    }

    /**
     * @param bool   $match
     * @param mixed  $value
     * @param mixed  $pattern
     * @param bool   $expected
     * @param string $exception
     *
     * @dataProvider providerRegexs
     */
    public function testRegex($match, $value, $pattern, $expected, $exception = null)
    {
        if ($exception !== null) {
            $this->setExpectedException($exception);
        }

        $method = $match ? 'matchRegex' : 'notMatchRegex';

        $this->assertEquals($expected, ValidatorString::$method($value, $pattern));
    }

    /**
     * @return array
     */
    public function providerRegexs()
    {
        return array(
            // match (true|false), value, pattern, expected, exception
            array(true, 'john doe', '/doe/', true),
            array(true, 'john doe', '/test/', false),
            array(true, array(), '/test/', false, 'Symfony\Component\Validator\Exception\UnexpectedTypeException'),
            array(false, 'john doe', '/doe/', false),
            array(false, 'john doe', '/test/', true),
        );
    }

    /**
     * @param string $ip
     * @param string $version
     * @param bool   $expected
     * @param string $exception
     *
     * @dataProvider providerIps
     */
    public function testIsIp($ip, $version, $expected, $exception = null)
    {
        if ($exception !== null) {
            $this->setExpectedException($exception);
        }

        $this->assertEquals($expected, ValidatorString::isIp($ip, $version));
    }

    /**
     * @return array
     */
    public function providerIps()
    {
        return array(
            // ip, version, expected, exception
            array('94.132.104.160', '4', true),
            array('94.132.104.160', '6', false),
            array('127.0.0.1', '4_no_res', false),
            array('192.168.1.10', '4', true),
            array('192.168.1.10', '4_no_priv', false),
            array(array(), '4', null, 'Symfony\Component\Validator\Exception\UnexpectedTypeException')
        );
    }
}
