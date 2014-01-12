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

use EBT\Validator\ValidatorCollectionExtended;

/**
 * ValidatorCollectionExtendedTest
 */
class ValidatorCollectionExtendedTest extends TestCase
{
    public function testIsCount()
    {
        $this->assertTrue(ValidatorCollectionExtended::isCount(array(2, 3), 2));
        $this->assertFalse(ValidatorCollectionExtended::isCount(array(2, 3), 9));
    }

    public function testIsMin()
    {
        $this->assertTrue(ValidatorCollectionExtended::isCountMin(array(2, 3), 1));
        $this->assertFalse(ValidatorCollectionExtended::isCountMin(array(2, 3), 9));
    }

    public function testIsMax()
    {
        $this->assertTrue(ValidatorCollectionExtended::isCountMax(array(2, 3), 10));
        $this->assertFalse(ValidatorCollectionExtended::isCountMax(array(2, 3), 1));
    }

    public function testIsEmpty()
    {
        $this->assertFalse(ValidatorCollectionExtended::isEmpty(array(2, 3)));
        $this->assertTrue(ValidatorCollectionExtended::isEmpty(array()));
    }

    public function testIsNotEmpty()
    {
        $this->assertTrue(ValidatorCollectionExtended::isNotEmpty(array(2, 3)));
        $this->assertFalse(ValidatorCollectionExtended::isNotEmpty(array()));
    }
}
