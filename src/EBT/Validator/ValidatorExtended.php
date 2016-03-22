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
use Symfony\Component\Validator\Constraints\Type as TypeConstraint;
use Symfony\Component\Validator\Constraints\Range as RangeConstraint;
use EBT\Validator\Constraint\RangeExclusive as RangeExclusiveConstraint;

/**
 * ValidatorExtended
 */
abstract class ValidatorExtended extends BaseValidator
{
    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function isStringAndNotBlank($value)
    {
        $violations = static::getValidator()->validate(
            $value,
            array(
                new TypeConstraint(array('type' => 'string')),
                new NotBlankConstraint()
            )
        );
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function isPositiveInteger($value)
    {
        $violations = static::getValidator()->validate(
            $value,
            array(
                new TypeConstraint(array('type' => 'integer')),
                new RangeConstraint(array('min' => 1))
            )
        );
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function isZeroOrPositiveInteger($value)
    {
        $violations = static::getValidator()->validate(
            $value,
            array(
                new TypeConstraint(array('type' => 'integer')),
                new RangeConstraint(array('min' => 0))
            )
        );
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function isPositiveFloat($value)
    {
        $violations = static::getValidator()->validate(
            $value,
            array(
                new TypeConstraint(array('type' => 'float')),
                new RangeExclusiveConstraint(array('min' => 0))
            )
        );
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function isZeroOrPositiveFloat($value)
    {
        $violations = static::getValidator()->validate(
            $value,
            array(
                new TypeConstraint(array('type' => 'float')),
                new RangeConstraint(array('min' => 0))
            )
        );
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }
}
