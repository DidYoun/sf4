<?php

namespace Slab\Component\User\Model;

use Doctrine\ORM\EntityManagerInterface;
use Slab\Component\Security\Entity\User;

/**
 * Class UserModel
 *
 * @package     Slab\Component\User\Model
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 */
class UserModel
{
    /** @var EntityManagerInterface $em */
    private $em;

    /**
     * UserModel constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @param User $user
     */
    public function save(User $user)
    {
        $this->em->persist($user);
        $this->em->flush();
    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}