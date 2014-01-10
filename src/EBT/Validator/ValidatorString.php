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
     * @param mixed $value
     *
     * @return bool
     */
    public static function isEmail($value)
    {
        $violations = static::getValidator()->validateValue($value, new Constraints\Email());
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * @param mixed $value
     * @param int   $min
     * @param int   $max
     *
     * @return bool
     */
    public static function isLength($value, $min = null, $max = null)
    {
        $options = array(
            'min' => $min,
            'max' => $max
        );

        $violations = static::getValidator()->validateValue($value, new Constraints\Length($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }
}
