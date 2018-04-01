<?php

namespace Slab\Component\User\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Slab\Component\Core\Controller\AppRestController;
use Slab\Component\Security\Entity\User;
use Slab\Component\User\Form\Type\NewType;
use Slab\Component\User\Manager\UserManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserRestController
 *
 * @package     Slab\Component\User\Controller
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 *
 * @Route("/rest/slab_users")
 */
class UserRestController extends AppRestController
{
    /** @var UserManager $manager */
    private $manager;

    /**
     * UserRestController constructor.
     *
     * @param UserManager $userManager
     */
    public function __construct(UserManager $userManager)
    {
        $this->manager = $userManager;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @Route("/new",
     *     name="slab.user.new"
     * )
     * @Method("POST")
     */
    public function newAction(Request $request) : Response
    {
        $data = $this->decodeBody($request);


        $response = $this->manager->save($data);

        dump($response);
        die;
    }

    /**
     * @Route("/edit/:id",
     *     name="slab.user.edit"
     * )
     * @Method({"PUT", "PATCH"})
     */
    public function editAction()
    {
        die('edit user');
    }

    /**
     * @Route("/delete/:id",
     *     name="slab.user.delete"
     * )
     * @Method("DELETE")
     */
    public function deleteAction()
    {
        die('delete user');
    }
}