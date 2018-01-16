<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AppController
 *
 * @package         App\Controller
 * @author          Didier Youn <didier.youn@dnd.fr>
 * @copyright       Copyright (c) 2017 Agence Dn'D
 * @license         http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link            http://www.dnd.fr/
 */
class AppController extends AbstractController
{

    /**
     * @Route("/", name="app.index")
     * @return Response
     */
    public function index()
    {
        return $this->render('@App/index.html.twig');
    }
}