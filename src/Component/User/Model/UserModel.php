<?php

namespace Slab\Component\User\Model;

use Slab\Component\User\Model\Validator\UserValidator;

/**
 * Class UserModel
 *
 * @package     Slab\Component\User\Model
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 */
class UserModel
{
    /** @var UserValidator */
    private $validator;

    /**
     * UserModel constructor.
     *
     * @param UserValidator $userValidator
     */
    public function __construct(UserValidator $userValidator)
    {
        $this->validator = $userValidator;
    }

    /**
     * @return UserValidator
     */
    public function getValidator() : UserValidator
    {
        return $this->validator;
    }
}