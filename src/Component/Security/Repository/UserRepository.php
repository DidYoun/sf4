<?php

namespace Slab\Component\Security\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Slab\Component\Security\Entity\User;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class UserRepository
 *
 * @package     Slab\Component\Security\Repository
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 */
class UserRepository extends ServiceEntityRepository
{
    /**
     * UserRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Get user by 3 params :
     * --> username
     * --> email
     * --> mobile phone
     *
     * @param string $username
     * @return User|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function authenticate(string $username) : ?User
    {
        $qb = $this->createQueryBuilder('u')
            ->andWhere('u.username = :username OR u.email = :username')
            ->setParameter('username', $username)
            ->getQuery();

        $user = $qb->setMaxResults(1)->getOneOrNullResult();

        return $user;
    }
}