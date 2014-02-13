<?php

/*
 * This file is a part of the Validator library.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * RangeExclusiveValidator
 */
class RangeExclusiveValidator extends ConstraintValidator
{
    /**
     * {@inheritDoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (null === $value) {
            return;
        }

        if (!is_numeric($value)) {
            $this->context->addViolation($constraint->invalidMessage, array('{{ value }}' => $value));
            return;
        }

        if (null !== $constraint->max && $value >= $constraint->max) {
            $this->context->addViolation(
                $constraint->maxMessage,
                array('{{ value }}' => $value, '{{ limit }}' => $constraint->max)
            );
            return;
        }

        if (null !== $constraint->min && $value <= $constraint->min) {
            $this->context->addViolation(
                $constraint->minMessage,
                array('{{ value }}' => $value, '{{ limit }}' => $constraint->min)
            );
        }
    }
}
