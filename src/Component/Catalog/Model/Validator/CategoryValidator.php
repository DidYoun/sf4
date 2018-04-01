<?php

namespace Slab\Component\Catalog\Model\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Exception\NoSuchMetadataException;
use Symfony\Component\Validator\Mapping\MetadataInterface;
use Symfony\Component\Validator\Validator\ContextualValidatorInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class CategoryValidator
 *
 * @package     Slab\Component\Catalog\Model\Validator
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 */
class CategoryValidator implements ValidatorInterface
{
    public function validate($value, $constraints = null, $groups = null)
    {
        // TODO: Implement validate() method.
    }

    public function validateProperty($object, $propertyName, $groups = null)
    {
        // TODO: Implement validateProperty() method.
    }

    public function validatePropertyValue($objectOrClass, $propertyName, $value, $groups = null)
    {
        // TODO: Implement validatePropertyValue() method.
    }

    public function startContext()
    {
        // TODO: Implement startContext() method.
    }

    public function inContext(ExecutionContextInterface $context)
    {
        // TODO: Implement inContext() method.
    }

    public function getMetadataFor($value)
    {
        // TODO: Implement getMetadataFor() method.
    }

    public function hasMetadataFor($value)
    {
        // TODO: Implement hasMetadataFor() method.
    }
}