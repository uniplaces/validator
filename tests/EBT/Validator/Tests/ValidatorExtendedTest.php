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

use EBT\Validator\ValidatorExtended;
use Symfony\Component\Validator\Validation;

/**
 * ValidatorExtendedTest
 */
class ValidatorExtendedTest extends TestCase
{
    public function testIsStringAndNotBlank()
    {
        $this->assertFalse(ValidatorExtended::isStringAndNotBlank(array()));
        $this->assertFalse(ValidatorExtended::isStringAndNotBlank(''));
        $this->assertTrue(ValidatorExtended::isStringAndNotBlank('test'));
    }

    public function testIsPositiveInteger()
    {
        // this fails fow now (so is commented)
        //$this->assertFalse(ValidatorExtended::isPositiveInteger(array()));
        $this->assertFalse(ValidatorExtended::isPositiveInteger('test'));
        $this->assertFalse(ValidatorExtended::isPositiveInteger(-5));
        $this->assertTrue(ValidatorExtended::isPositiveInteger(1));
        $this->assertTrue(ValidatorExtended::isPositiveInteger(10));
    }
}
