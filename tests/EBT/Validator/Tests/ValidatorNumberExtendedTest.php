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

use EBT\Validator\ValidatorNumberExtended;

/**
 * ValidatorNumberExtendedTest
 */
class ValidatorNumberExtendedTest extends TestCase
{
    public function testIsMin()
    {
        $this->assertTrue(ValidatorNumberExtended::isMin(10, 5));
        $this->assertFalse(ValidatorNumberExtended::isMin(10, 20));
    }

    public function testIsMax()
    {
        $this->assertFalse(ValidatorNumberExtended::isMax(10, 5));
        $this->assertTrue(ValidatorNumberExtended::isMax(10, 20));
    }
}
