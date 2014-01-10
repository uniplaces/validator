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

use Symfony\Component\Validator\Validation as SfValidation;
use Symfony\Component\Validator\ValidatorInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * BaseValidator
 */
abstract class BaseValidator
{
    /**
     * @var ConstraintViolationListInterface
     */
    protected static $violations;

    /**
     * Returns validator.
     *
     * @return ValidatorInterface
     */
    protected static function getValidator()
    {
        return SfValidation::createValidator();
    }

    /**
     * @param ConstraintViolationListInterface $violations
     */
    protected static function setViolations(ConstraintViolationListInterface $violations)
    {
        static::$violations = $violations;
    }

    /**
     * @param ConstraintViolationListInterface $violations
     *
     * @return bool
     */
    protected static function violationsToBool(ConstraintViolationListInterface $violations)
    {
        return count($violations) == 0;
    }

    /**
     * @return ConstraintViolationListInterface
     */
    public static function getViolations()
    {
        return static::$violations;
    }
}
