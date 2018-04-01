<?php

namespace Slab\Component\Core\Manager;

use Doctrine\ORM\EntityManagerInterface;

/**
 * Class BaseManager
 *
 * @package     Slab\Component\Core\Manager
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 */
abstract class BaseManager implements BaseManagerInterface
{
    /** @var EntityManagerInterface $em */
    protected $em;

    /**
     * BaseManager constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct
    (
        EntityManagerInterface $entityManager
    ){
        $this->em = $entityManager;
    }

    public function save($Entity = null)
    {
        // TODO: Implement save() method.
    }

    public function edit($entity = null)
    {
        // TODO: Implement edit() method.
    }

    public function delete($entity = null)
    {
        // TODO: Implement delete() method.
    }
}