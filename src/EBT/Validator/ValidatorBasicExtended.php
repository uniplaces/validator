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
 * ValidatorBasicExtended, add convenient methods/alias on top of Symfony validation.
 */
abstract class ValidatorBasicExtended extends ValidatorBasic
{
    /**
     * @param mixed $value
     * @param array $options
     *
     * @return bool
     */
    public static function isTypeInt($value, array $options = array())
    {
        return static::isType($value, 'int', $options);
    }

    /**
     * @param mixed $value
     * @param array $options
     *
     * @return bool
     */
    public static function isTypeString($value, array $options = array())
    {
        return static::isType($value, 'string', $options);
    }

    /**
     * @param mixed $value
     * @param array $options
     *
     * @return bool
     */
    public static function isTypeBool($value, array $options = array())
    {
        return static::isType($value, 'bool', $options);
    }
}
