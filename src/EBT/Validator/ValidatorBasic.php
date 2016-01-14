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
use Symfony\Component\Validator\Constraints\IsNull as NullConstraint;
use Symfony\Component\Validator\Constraints\IsTrue as TrueConstraint;
use Symfony\Component\Validator\Constraints\IsFalse as FalseConstraint;
use Symfony\Component\Validator\Constraints\Type as TypeConstraint;

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

    /**
     * Validates that a value is true. Specifically, this checks to see if the value is exactly true, exactly the
     * integer 1, or exactly the string "1".
     *
     * @param mixed $value
     * @param array $options
     *
     * @return bool
     */
    public static function isTrue($value, array $options = array())
    {
        $violations = static::getValidator()->validateValue($value, new TrueConstraint($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * Validates that a value is false. Specifically, this checks to see if the value is exactly false, exactly the
     * integer 0, or exactly the string "0".
     *
     * @param mixed $value
     * @param array $options
     *
     * @return bool
     */
    public static function isFalse($value, array $options = array())
    {
        $violations = static::getValidator()->validateValue($value, new FalseConstraint($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * Validates that a value is of a specific data type. For example, if a variable should be an array, you can use
     * this constraint with the array type option to validate this.
     *
     * @param mixed  $value
     * @param string $type    array|bool|callable|float|double|int|long|null|numeric|object|real|resource|scalar|string
     * @param array  $options
     *
     * @return bool
     */
    public static function isType($value, $type, array $options = array())
    {
        $options['type'] = $type;

        $violations = static::getValidator()->validateValue($value, new TypeConstraint($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }
}
