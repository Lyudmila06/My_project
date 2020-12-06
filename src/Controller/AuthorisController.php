<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class AuthorisController
{
    public function home()
    {
        return new Response('Helloyello');
    }
}