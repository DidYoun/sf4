<?php

namespace Slab\Component\Core\Model\Validator;

use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Interface BaseValidatorInterface
 *
 * @package     Slab\Component\Core\Model\Validator
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 */
interface BaseValidatorInterface
{
    public function validate($entity = null);
}