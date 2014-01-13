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

use EBT\Validator\ValidatorBasicExtended;

/**
 * ValidatorBasicExtendedTest
 */
class ValidatorBasicExtendedTest extends TestCase
{
    public function testIsTypeInt()
    {
        $this->assertTrue(ValidatorBasicExtended::isTypeInt(10));
        $this->assertFalse(ValidatorBasicExtended::isTypeInt(10.5));
        $this->assertFalse(ValidatorBasicExtended::isTypeInt('test'));
        $this->assertFalse(ValidatorBasicExtended::isTypeInt(true));
    }

    public function testIsTypeString()
    {
        $this->assertFalse(ValidatorBasicExtended::isTypeString(10));
        $this->assertFalse(ValidatorBasicExtended::isTypeString(10.5));
        $this->assertTrue(ValidatorBasicExtended::isTypeString('test'));
        $this->assertFalse(ValidatorBasicExtended::isTypeString(false));
    }

    public function testIsTypeBool()
    {
        $this->assertFalse(ValidatorBasicExtended::isTypeBool(10));
        $this->assertFalse(ValidatorBasicExtended::isTypeBool(10.5));
        $this->assertFalse(ValidatorBasicExtended::isTypeBool('test'));
        $this->assertTrue(ValidatorBasicExtended::isTypeBool(false));
    }

    public function testIsNumeric()
    {
        $this->assertTrue(ValidatorBasicExtended::isNumeric(10.5));
        $this->assertTrue(ValidatorBasicExtended::isNumeric('10.5'));
        $this->assertFalse(ValidatorBasicExtended::isNumeric('test'));
    }
}
