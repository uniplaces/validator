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

use Symfony\Component\Validator\Constraints\Email as EmailConstraint;
use Symfony\Component\Validator\Constraints\Length as LengthConstraint;
use Symfony\Component\Validator\Constraints\Url as UrlConstraint;
use Symfony\Component\Validator\Constraints\Regex as RegexConstraint;
use Symfony\Component\Validator\Constraints\Ip as IpConstraint;

/**
 * ValidatorString
 */
abstract class ValidatorString extends BaseValidator
{
    /**
     * @param string $value
     * @param array  $options
     *
     * @return bool
     */
    public static function isEmail($value, array $options = array())
    {
        $violations = static::getValidator()->validate($value, new EmailConstraint($options));
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
    public static function inLength($value, $min = null, $max = null, array $options = array())
    {
        if ($min !== null) {
            $options['min'] = $min;
        }
        if ($max !== null) {
            $options['max'] = $max;
        }

        $violations = static::getValidator()->validate($value, new LengthConstraint($options));
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
        $violations = static::getValidator()->validate($value, new UrlConstraint($options));
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
        $violations = static::getValidator()->validate($value, new RegexConstraint($options));
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

        $violations = static::getValidator()->validate($value, new IpConstraint($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }
}
