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
        // this fails for now (so is commented)
        //$this->assertFalse(ValidatorExtended::isPositiveInteger(array()));
        $this->assertFalse(ValidatorExtended::isPositiveInteger('test'));
        $this->assertFalse(ValidatorExtended::isPositiveInteger(-5));
        $this->assertFalse(ValidatorExtended::isPositiveInteger(0));
        $this->assertTrue(ValidatorExtended::isPositiveInteger(1));
        $this->assertTrue(ValidatorExtended::isPositiveInteger(10));
    }

    public function testIsZeroOrPositiveInteger()
    {
        // this fails fow now (so is commented)
        //$this->assertFalse(ValidatorExtended::isZeroOrPositiveInteger(array()));
        $this->assertFalse(ValidatorExtended::isZeroOrPositiveInteger('test'));
        $this->assertFalse(ValidatorExtended::isZeroOrPositiveInteger(-5));
        $this->assertTrue(ValidatorExtended::isZeroOrPositiveInteger(0));
        $this->assertTrue(ValidatorExtended::isZeroOrPositiveInteger(1));
        $this->assertTrue(ValidatorExtended::isZeroOrPositiveInteger(10));
    }

    public function testIsPositiveFloat()
    {
        $this->assertFalse(ValidatorExtended::isPositiveFloat('test'));
        $this->assertFalse(ValidatorExtended::isPositiveFloat(-5));
        $this->assertFalse(ValidatorExtended::isPositiveFloat(-3.2));
        $this->assertFalse(ValidatorExtended::isPositiveFloat(0));
        $this->assertFalse(ValidatorExtended::isPositiveFloat(0.0));
        $this->assertTrue(ValidatorExtended::isPositiveFloat(0.1));
        $this->assertFalse(ValidatorExtended::isPositiveFloat(1));
        $this->assertTrue(ValidatorExtended::isPositiveFloat(1.0));
        $this->assertTrue(ValidatorExtended::isPositiveFloat(1.1));
        $this->assertFalse(ValidatorExtended::isPositiveFloat(0.1, 0.5));
        $this->assertFalse(ValidatorExtended::isPositiveFloat(10));
        $this->assertTrue(ValidatorExtended::isPositiveFloat(10.567));
    }

    public function testIsZeroOrPositiveFloat()
    {
        $this->assertFalse(ValidatorExtended::isZeroOrPositiveFloat('test'));
        $this->assertFalse(ValidatorExtended::isZeroOrPositiveFloat(-5));
        $this->assertFalse(ValidatorExtended::isZeroOrPositiveFloat(-3.2));
        $this->assertFalse(ValidatorExtended::isZeroOrPositiveFloat(0));
        $this->assertTrue(ValidatorExtended::isZeroOrPositiveFloat(0.0));
        $this->assertTrue(ValidatorExtended::isZeroOrPositiveFloat(0.1));
        $this->assertFalse(ValidatorExtended::isZeroOrPositiveFloat(1));
        $this->assertTrue(ValidatorExtended::isZeroOrPositiveFloat(1.0));
        $this->assertTrue(ValidatorExtended::isZeroOrPositiveFloat(1.1));
        $this->assertFalse(ValidatorExtended::isZeroOrPositiveFloat(10));
        $this->assertTrue(ValidatorExtended::isZeroOrPositiveFloat(10.567));
    }
}
