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

use Symfony\Component\Validator\Constraints;

/**
 * ValidatorString
 */
class ValidatorString extends BaseValidator
{
    /**
     * @param string $value
     * @param array  $options
     *
     * @return bool
     */
    public static function isEmail($value, array $options = array())
    {
        $violations = static::getValidator()->validateValue($value, new Constraints\Email($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * @param string $value
     * @param int    $min
     * @param int    $max
     * @param array  $options
     *
     * @return bool
     */
    public static function isLength($value, $min = null, $max = null, array $options = array())
    {
        if ($min !== null) {
            $options['min'] = $min;
        }
        if ($max !== null) {
            $options['max'] = $max;
        }

        $violations = static::getValidator()->validateValue($value, new Constraints\Length($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * @param string $value
     * @param array  $options
     *
     * @return bool
     */
    public static function isUrl($value, array $options = array())
    {
        $violations = static::getValidator()->validateValue($value, new Constraints\Url($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * @param string $value
     * @param string $pattern
     * @param array  $options
     *
     * @return bool
     */
    public static function matchRegex($value, $pattern, array $options = array())
    {
        $options['pattern'] = $pattern;
        $options['match'] = true;

        return static::regex($value, $options);
    }

    /**
     * @param string $value
     * @param string $pattern
     * @param array  $options
     *
     * @return bool
     */
    public static function notMatchRegex($value, $pattern, array $options = array())
    {
        $options['pattern'] = $pattern;
        $options['match'] = false;

        return static::regex($value, $options);
    }

    /**
     * @param string $value
     * @param array  $options
     *
     * @return bool
     */
    protected static function regex($value, array $options = array())
    {
        $violations = static::getValidator()->validateValue($value, new Constraints\Regex($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * @param string $value
     * @param string $version
     * @param array  $options
     *
     * @return bool
     */
    public static function isIp($value, $version = '4', array $options = array())
    {
        $options['version'] = $version;

        $violations = static::getValidator()->validateValue($value, new Constraints\Ip($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }
}
