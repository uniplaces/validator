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

use Symfony\Component\Validator\Constraints\Choice as ChoiceConstraint;
use Symfony\Component\Validator\Constraints\Count as CountConstraint;

/**
 * ValidatorCollection
 */
abstract class ValidatorCollection extends BaseValidator
{
    /**
     * @param mixed $value
     * @param array $choices
     * @param array $options
     *
     * @return bool
     */
    public static function inChoice($value, array $choices, array $options = array())
    {
        $options['choices'] = $choices;

        $violations = static::getValidator()->validate($value, new ChoiceConstraint($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * @param mixed $value
     * @param mixed $callback
     * @param array $options
     *
     * @return bool
     */
    public static function inChoiceCallback($value, $callback, array $options = array())
    {
        $options['callback'] = $callback;

        $violations = static::getValidator()->validate($value, new ChoiceConstraint($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }

    /**
     * @param array|object $value
     * @param int          $min
     * @param int          $max
     * @param array        $options
     *
     * @return bool
     */
    public static function inCountRange($value, $min = null, $max = null, array $options = array())
    {
        if ($min !== null) {
            $options['min'] = $min;
        }
        if ($max !== null) {
            $options['max'] = $max;
        }

        $violations = static::getValidator()->validate($value, new CountConstraint($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }
}
