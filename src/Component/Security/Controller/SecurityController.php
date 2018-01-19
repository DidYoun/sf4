<?php

namespace Slab\Component\Security\Controller;

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

        return $this->render(
            '@Slab/Security/User/login.html.twig', [
                'last_username' => $authenticationUtils->getLastUsername(),
                'errors' => $authenticationUtils->getLastAuthenticationError(),
            ]
        );
    }
}