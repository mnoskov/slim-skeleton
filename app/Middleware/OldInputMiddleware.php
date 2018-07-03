<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class OldInputMiddleware extends \App\System\Middleware
{
    public function __invoke(Request $request, Response $response, callable $next)
    {
        if ($request->getMethod() == 'POST') {
            $this->ci->flash->addMessage('old', $request->getParams());
        }

        return $next($request, $response);
    }
}
