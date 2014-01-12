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

use Symfony\Component\Validator\Constraints\NotBlank as NotBlankConstraint;
use Symfony\Component\Validator\Constraints\Blank as BlankConstraint;
use Symfony\Component\Validator\Constraints\NotNull as NotNullConstraint;
use Symfony\Component\Validator\Constraints\Null as NullConstraint;

/**
 * ValidatorBasic
 */
abstract class ValidatorBasic extends BaseValidator
{
    /**
     * Validates that a value is not blank, defined as not equal to a blank string and also not equal to null.
     *
     * @param mixed $value
     * @param array $options
     *
     * @return bool
     */
    public static function isNotBlank($value, array $options = array())
    {
        $violations = static::getValidator()->validateValue($value, new NotBlankConstraint($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * Validates that a value is blank, defined as equal to a blank string or equal to null.
     *
     * @param mixed $value
     * @param array $options
     *
     * @return bool
     */
    public static function isBlank($value, array $options = array())
    {
        $violations = static::getValidator()->validateValue($value, new BlankConstraint($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * Validates that a value is not strictly equal to null.
     *
     * @param mixed $value
     * @param array $options
     *
     * @return bool
     */
    public static function isNotNull($value, array $options = array())
    {
        $violations = static::getValidator()->validateValue($value, new NotNullConstraint($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * Validates that a value is exactly equal to null.
     *
     * @param mixed $value
     * @param array $options
     *
     * @return bool
     */
    public static function isNull($value, array $options = array())
    {
        $violations = static::getValidator()->validateValue($value, new NullConstraint($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }
}
