<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class TrimEndSlashMiddleware extends Middleware
{
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $uri = $request->getUri();
        $path = $uri->getPath();

        if ($path != '/' && substr($path, -1) == '/') {
            $uri = $uri->withPath(rtrim($path, '/'));
            
            if ($request->getMethod() == 'GET') {
                return $response->withRedirect((string)$uri, 301);
            } else {
                return $next($request->withUri($uri), $response);
            }
        }

        return $next($request, $response);
    }
}
