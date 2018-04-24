<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController extends \App\System\Controller
{
    public function index(Request $request, Response $response, array $args): Response
    {
        return $this->ci->view->render($response, 'home.twig');
    }
}
