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
 * ValidatorStringExtended, add convenient methods/alias on top of Symfony validation.
 */
abstract class ValidatorStringExtended extends ValidatorString
{
    /**
     * @param string $value
     * @param int    $min
     * @param array  $options
     *
     * @return bool
     */
    public static function isMinLength($value, $min, array $options = array())
    {
        return static::inLength($value, $min, null, $options);
    }

    /**
     * @param string $value
     * @param int    $max
     * @param array  $options
     *
     * @return bool
     */
    public static function isMaxLength($value, $max, array $options = array())
    {
        return static::inLength($value, null, $max, $options);
    }
}
