<?php

namespace Slab\Component\Core\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AppController
 *
 * @package     Slab\Component\Core\Controller
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 */
class AppController extends AbstractController
{
    /**
     * @Route("/", name="slab_core.app.index")
     * @return Response
     */
    public function index()
    {
        return $this->render('@Slab/Core/html/index.html.twig');
    }
}