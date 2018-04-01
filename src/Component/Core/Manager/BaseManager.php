<?php

namespace Slab\Component\Core\Manager;

use Doctrine\ORM\EntityManagerInterface;
use Slab\Component\Core\Model\Hydrator\BaseHydratorInterface;
use Symfony\Component\HttpFoundation\Response;

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

    /** @var EntityManagerInterface $em */
    protected $hydrator = null;

    /**
     * BaseManager constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param BaseHydratorInterface $baseHydrator
     */
    public function __construct
    (
        EntityManagerInterface $entityManager,
        BaseHydratorInterface $baseHydrator
    ){
        $this->em = $entityManager;
        $this->hydrator = $baseHydrator;
    }


    public function save($entity = null)
    {
        try {
            $entity = $this->hydrator->hydrate($entity);

            if ($entity instanceof Response) {
                die;
            }

            $this->em->persist($entity);
            $this->em->flush();
        } catch (\Exception $exception) {

        }
    }

    public function edit($entity = null)
    {
    }

    public function delete($entity = null)
    {
    }
}