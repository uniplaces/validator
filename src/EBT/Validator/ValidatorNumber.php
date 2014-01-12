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

use Symfony\Component\Validator\Constraints\Range as RangeConstraint;

/**
 * ValidatorNumber
 */
abstract class ValidatorNumber extends BaseValidator
{
    /**
     * @param int|float|string $value
     * @param int|float        $min
     * @param int|float        $max
     * @param array            $options
     *
     * @return bool
     */
    public static function inRange($value, $min = null, $max = null, array $options = array())
    {
        if ($min !== null) {
            $options['min'] = $min;
        }
        if ($max !== null) {
            $options['max'] = $max;
        }

        $violations = static::getValidator()->validateValue($value, new RangeConstraint($options));
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }
}
