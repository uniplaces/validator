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
}
