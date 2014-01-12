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

use EBT\Validator\ValidatorStringExtended;

/**
 * ValidatorStringExtendedTest
 */
class ValidatorStringExtendedTest extends TestCase
{
    public function testIsMinLength()
    {
        $this->assertTrue(ValidatorStringExtended::isMinLength('test', 2));
        $this->assertFalse(ValidatorStringExtended::isMinLength('t', 2));
    }

    public function testIsMaxLength()
    {
        $this->assertFalse(ValidatorStringExtended::isMaxLength('test', 2));
        $this->assertTrue(ValidatorStringExtended::isMaxLength('t', 2));
    }
}
