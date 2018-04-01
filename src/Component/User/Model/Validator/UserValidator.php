<?php

namespace Slab\Component\User\Model\Validator;

use Slab\Component\Core\Model\Validator\BaseValidatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class UserValidator
 *
 * @package     Slab\Component\User\Model\Validator
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 */
class UserValidator implements BaseValidatorInterface
{
    /** @var ValidatorInterface */
    private $validator;

    /**
     * UserValidator constructor.
     *
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * {@inheritdoc}
     */
    public function validate($user = null)
    {
        $errors = $this->validator->validate($user);

        dump($user);
        dump($errors);
        die;
        return count($errors) > 0 ? new Response((string) $errors) : true;
    }
}