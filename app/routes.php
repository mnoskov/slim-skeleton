<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->get('/', 'App\Controllers\HomeController:index');

$app->add(new App\Middleware\TrimEndSlashMiddleware($app->getContainer()));

// uncomment for basic auth
// $app->add(new App\Middleware\AuthMiddleware($app->getContainer()));

