<?php

namespace Slab\Component\User\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Slab\Component\Core\Controller\AppRestController;
use Slab\Component\Security\Entity\User;
use Slab\Component\User\Form\Type\NewType;
use Slab\Component\User\Model\UserModel;
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
    /** @var UserModel $model */
    private $model;

    /**
     * UserRestController constructor.
     *
     * @param UserModel $userModel
     */
    public function __construct(UserModel $userModel)
    {
        $this->model = $userModel;
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

        $user = new User();

        $form = $this->createForm(NewType::class, $user);
        $form->submit($data);

        if ($form->isValid()) {
            $this->model->save($user);

            return $this->jsonResponse($this::API_RESPONSE_SUCCESS, []);
        }

        return $this->jsonResponse($this::API_RESPONSE_ERROR, $this->getFormErrors($form));
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