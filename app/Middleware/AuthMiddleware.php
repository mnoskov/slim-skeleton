<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\User;

class AuthMiddleware extends Middleware
{
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $login    = $request->getHeader('PHP_AUTH_USER');
        $password = $request->getHeader('PHP_AUTH_PW');

        if ($login && $password) {
            $user = User::where('login', $login[0])->first();

            if ($user && password_verify($password[0], $user->password)) {
                return $next($request, $response);
            }
        }

        $response = $response->withStatus(401)->withHeader('WWW-Authenticate', 'Basic realm="Secure Page"');
        return $response;
    }
}
