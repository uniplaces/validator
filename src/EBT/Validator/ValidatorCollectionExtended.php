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
 * ValidatorCollectionExtended, add convenient methods/alias on top of Symfony validation.
 */
abstract class ValidatorCollectionExtended extends ValidatorCollection
{
    /**
     * @param array|object $value
     * @param int          $count   Expected count
     * @param array        $options
     *
     * @return bool
     */
    public static function isCount($value, $count, array $options = array())
    {
        return static::inCountRange($value, $count, $count, $options);
    }

    /**
     * @param array|object $value
     * @param int          $min
     * @param array        $options
     *
     * @return bool
     */
    public static function isCountMin($value, $min, array $options = array())
    {
        return static::inCountRange($value, $min, null, $options);
    }

    /**
     * @param array|object $value
     * @param int          $max
     * @param array        $options
     *
     * @return bool
     */
    public static function isCountMax($value, $max, array $options = array())
    {
        return static::inCountRange($value, null, $max, $options);
    }

    /**
     * @param array|object $value
     * @param array        $options
     *
     * @return bool
     */
    public static function isEmpty($value, array $options = array())
    {
        return static::isCount($value, 0, $options);
    }

    /**
     * @param array|object $value
     * @param array        $options
     *
     * @return bool
     */
    public static function isNotEmpty($value, array $options = array())
    {
        return static::isCountMin($value, 1, $options);
    }
}
