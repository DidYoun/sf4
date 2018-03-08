<?php

namespace Slab\Component\Core\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AppRestController
 *
 * @package     Slab\Component\Core\Controller
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 */
class AppRestController extends AbstractController
{
    protected const API_RESPONSE_SUCCESS = 'success';
    protected const API_RESPONSE_ERROR = 'error';

    /**
     * @param string $status
     * @return JsonResponse
     */
    protected function jsonResponse(string $status, array $messages) : JsonResponse
    {
        return new JsonResponse([
            'status'    => $status,
            'messages'  => $messages,
            'result'    => []
        ]);
    }

    protected function decodeBody(Request $request) : array
    {
        if (is_null($request->getContent()) || is_null($request->request->all())) {
            return [];
        }
        $body = $request->getContent();
        if (!$body) {
            return $request->request->all();
        }
        try {
            return json_decode($body, true);
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * @param FormInterface $form
     * @return array
     */
    protected function getFormErrors(FormInterface $form) : array
    {
        $errors = [];

        foreach ($form->getErrors() as $key => $error) {
            if ($form->isRoot()) {
                $errors['#'][] = $error->getMessage();
            } else {
                $errors[] = $error->getMessage();
            }
        }

        foreach ($form->all() as $child) {
            if (!$child->isValid()) {
                $errors[$child->getName()] = $this->getFormErrors($child);
            }
        }

        return $errors;
    }
}