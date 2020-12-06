<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AuthorisationController extends AbstractController
{
    /**
     * @Route("/authorisation", name="authorisation")
     */
    public function index()
    {
        return $this->render('authorisation/index.html.twig', [
            'controller_name' => 'AuthorisationController',
        ]);
    }
}
