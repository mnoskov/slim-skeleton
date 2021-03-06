<?php

require __DIR__ . '/../vendor/autoload.php';

session_start();

$settings = require __DIR__ . '/../app/settings.php';
$settings['settings']['public_path'] = __DIR__;

$app = new \Slim\App($settings);
$container = $app->getContainer();

App\System\ContainerSingleton::run($container);

require __DIR__ . '/../app/dependencies.php';
require __DIR__ . '/../app/routes.php';
require __DIR__ . '/../app/helpers.php';

$app->run();
