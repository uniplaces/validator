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

use Symfony\Component\Validator\Constraints\Date as DateConstraint;
use Symfony\Component\Validator\Constraints\DateTime as DateTimeConstraint;
use Symfony\Component\Validator\Constraints\Time as TimeConstraint;

/**
 * ValidatorDate
 */
abstract class ValidatorDate extends BaseValidator
{
    /**
     * Validates that a value is a valid date, meaning either a DateTime object or a string (or an object that can be
     * cast into a string) that follows a valid YYYY-MM-DD format.
     *
     * @param object|string $value
     *
     * @return bool
     */
    public static function isDate($value)
    {
        $violations = static::getValidator()->validateValue($value, new DateConstraint());
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * Validates that a value is a valid "datetime", meaning either a DateTime object or a string (or an object that
     * can be cast into a string) that follows a valid YYYY-MM-DD HH:MM:SS format.
     *
     * @param object|string $value
     *
     * @return bool
     */
    public static function isDateTime($value)
    {
        $violations = static::getValidator()->validateValue($value, new DateTimeConstraint());
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * Validates that a value is a valid time, meaning either a DateTime object or a string (or an object that can be
     * cast into a string) that follows a valid "HH:MM:SS" format.
     *
     * @param object|string $value
     *
     * @return bool
     */
    public static function isTime($value)
    {
        $violations = static::getValidator()->validateValue($value, new TimeConstraint());
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }
}
