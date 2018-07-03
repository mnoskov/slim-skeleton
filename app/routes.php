<?php

$app->get('/', 'App\Controllers\HomeController:index');

$app->add(new App\Middleware\TrimEndSlashMiddleware($container));
$app->add(new App\Middleware\OldInputMiddleware($container));

// uncomment for basic auth
// $app->add(new App\Middleware\AuthMiddleware($container));

