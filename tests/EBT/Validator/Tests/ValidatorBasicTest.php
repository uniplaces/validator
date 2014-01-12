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

use EBT\Validator\ValidatorBasic;

/**
 * ValidatorBasicTest
 */
class ValidatorBasicTest extends TestCase
{
    public function testIsNotBlank()
    {
        $this->assertFalse(ValidatorBasic::isNotBlank(null));
        $this->assertFalse(ValidatorBasic::isNotBlank(''));

        $this->assertTrue(ValidatorBasic::isNotBlank(0));
        $this->assertTrue(ValidatorBasic::isNotBlank(1));
        $this->assertTrue(ValidatorBasic::isNotBlank('test'));
    }

    public function testIsBlank()
    {
        $this->assertTrue(ValidatorBasic::isBlank(null));
        $this->assertTrue(ValidatorBasic::isBlank(''));

        $this->assertFalse(ValidatorBasic::isBlank(0));
        $this->assertFalse(ValidatorBasic::isBlank(1));
        $this->assertFalse(ValidatorBasic::isBlank('test'));
    }

    public function testIsNotNull()
    {
        $this->assertFalse(ValidatorBasic::isNotNull(null));

        $this->assertTrue(ValidatorBasic::isNotNull(''));
        $this->assertTrue(ValidatorBasic::isNotNull(0));
        $this->assertTrue(ValidatorBasic::isNotNull(1));
        $this->assertTrue(ValidatorBasic::isNotNull('test'));
    }

    public function testIsNull()
    {
        $this->assertTrue(ValidatorBasic::isNull(null));

        $this->assertFalse(ValidatorBasic::isNull(''));
        $this->assertFalse(ValidatorBasic::isNull(0));
        $this->assertFalse(ValidatorBasic::isNull(1));
        $this->assertFalse(ValidatorBasic::isNull('test'));
    }
}
