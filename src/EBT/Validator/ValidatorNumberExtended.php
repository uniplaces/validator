<?php

/*
 * This file is a part of the Validator library.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\Validator;

/**
 * ValidatorNumberExtended, add convenient methods/alias on top of Symfony validation.
 */
abstract class ValidatorNumberExtended extends ValidatorNumber
{
    /**
     * @param int|float|string $value
     * @param int|float        $min
     * @param array            $options
     *
     * @return bool
     */
    public static function isMin($value, $min, array $options = array())
    {
        return static::inRange($value, $min, null, $options);
    }

    /**
     * @param int|float|string $value
     * @param int|float        $max
     * @param array            $options
     *
     * @return bool
     */
    public static function isMax($value, $max, array $options = array())
    {
        return static::inRange($value, null, $max, $options);
    }
}
