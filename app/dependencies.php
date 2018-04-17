<?php

$container['view'] = function($c) {
    $settings = $c->get('settings');
    $view = new \Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new \Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['logger']['path'], \Monolog\Logger::DEBUG));
    return $logger;
};

$settings = $container->get('settings')['db'];
$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($settings);
$capsule->bootEloquent();
$capsule->setAsGlobal();

$container['db'] = function($c) use ($capsule, $settings) {
    $db = $capsule->getConnection();
    if ($settings['log']) {
        $db->enableQueryLog();
    }
    return $db;
};

$container['mailer'] = function($c) {
    $transport = new Swift_SendmailTransport('/usr/sbin/sendmail -bs');
    return new Swift_Mailer($transport);
};

