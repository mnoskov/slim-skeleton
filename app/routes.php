<?php

$app->get('/', 'App\Controllers\HomeController:index');

$app->add(new App\Middleware\TrimEndSlashMiddleware($app->getContainer()));

// uncomment for basic auth
// $app->add(new App\Middleware\AuthMiddleware($app->getContainer()));

