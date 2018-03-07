<?php

namespace Slab\Component\Security\Guard;

use Slab\Component\Security\Form\Type\LoginForm;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;

/**
 * Class LoginFormAuthenticator
 *
 * @package     Slab\Component\Security\Guard
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 */
class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
    /** @var RouterInterface $router */
    private $router;

    /** @var FormFactoryInterface */
    private $formFactory;

    /**
     * LoginFormAuthenticator constructor.
     *
     * @param RouterInterface $router
     * @param FormFactoryInterface $formFactoryBuilder
     */
    public function __construct(
        RouterInterface $router,
        FormFactoryInterface $formFactoryBuilder
    )
    {
        $this->router = $router;
        $this->formFactory = $formFactoryBuilder;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function supports(Request $request)
    {
        $isLoginSubmit = $request->getPathInfo() == $this->getLoginUrl()
            && $request->isMethod('POST');

        if (!$isLoginSubmit) {
            return false;
        }

        return true;
    }

    /**
     * Populate credentials
     *
     * @param Request $request
     * @return array[]
     */
    public function getCredentials(Request $request)
    {
        $form = $this->formFactory->create(LoginForm::class);
        $form->handleRequest($request);

        $data = $form->getData();

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function checkCredentials($credentials, UserInterface $user)
    {
        $password = $credentials['_password'];
        if ($password == 'iliketurtles') {
            return true;
        }

        return false;
    }


    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        dump($userProvider->loadUserByUsername('test')); die;
        $username = $credentials['_username'];

        dump($username);
        die;

    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // TODO: Implement onAuthenticationSuccess() method.
    }

    /**
     * @return string
     */
    protected function getLoginUrl()
    {
        return $this->router->generate('slab_security.security.login');
    }

    /**
     * @return string
     */
    protected function getDefaultSuccessRedirectUrl()
    {
        return $this->router->generate('slab_core.app.index');
    }
}