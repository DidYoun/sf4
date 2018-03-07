<?php

namespace Slab\Component\Security\Controller;

use Slab\Component\Security\Form\Type\LoginForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecurityController
 *
 * @package     Slab\Component\Security\Controller
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 */
class SecurityController extends Controller
{
    /**
     * @Route("/login",
     *     name="slab_security.security.login"
     * )
     */
    public function loginAction() : Response
    {
        /** @var AuthenticationUtils $authenticationUtils */
        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(LoginForm::class, [
            '_username' => $lastUsername
        ]);

        return $this->render(
            '@Slab/Security/User/login.html.twig', [
                'form'          => $form->createView(),
                'last_username' => $lastUsername,
                'errors'        => $error,
            ]
        );
    }

    /**
     * @Route("/logout",
     *     name="slab_security.security.logout"
     * )
     * @throws \Exception
     */
    public function logoutAction()
    {
        throw new \Exception('Never reach');
    }
}