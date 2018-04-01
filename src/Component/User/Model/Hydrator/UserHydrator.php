<?php

namespace Slab\Component\User\Model\Hydrator;
use Slab\Component\Core\Model\Hydrator\BaseHydratorInterface;
use Slab\Component\Security\Entity\User;
use Slab\Component\User\Model\UserModel;
use Slab\Component\User\Model\Validator\UserValidator;

/**
 * Class UserHydrator
 *
 * @package     Slab\Component\User\Model\Hydrator
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 */
class UserHydrator implements BaseHydratorInterface
{

    /** @var UserModel */
    private $model;

    /**
     * UserHydrator constructor.
     *
     * @param UserModel $userModel
     */
    public function __construct(
        UserModel $userModel
    ){
        $this->model = $userModel;
    }

    public function hydrate(array $data)
    {
        $user = new User();

        $user->setUsername(isset($data['username']) ? $data['username'] : null);
        $user->setEmail(isset($data['email']) ? $data['email'] : null);
        $user->setLastname(isset($data['lastname']) ? $data['lastname'] : null);
        $user->setFirstname(isset($data['firstname']) ? $data['firstname'] : null);
        $user->setPlainPassword(isset($data['plainPassword']) ? $data['plainPassword'] : null);
        $user->setPassword(isset($data['password']) ? $data['password'] : null);

        if (isset($data['roles'])) {
            $roles = explode(',', $data['roles']);
            foreach ($roles as $role) {
                $user->addRole($role);
            }
        }

        $validate = $this->model->getValidator()->validate($user);

        dump($user); die;
        if (!$this->model->getValidator()->validate($user)) {

        }

        return $user;
    }
}