<?php

$container['view'] = function($c)
{
    $settings = $c->get('settings');
    $view = new \Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    $view->addExtension(new Twig_Extension_Debug());

    $env = $view->getEnvironment();

    $env->addGlobal('app', $settings['app']);
    $env->addGlobal('flash', $c->flash->getMessages());

    if ($c->flash->hasMessage('old')) {
        $env->addGlobal('old', $c->flash->getFirstMessage('old'));
    }

    $env->addFilter(new Twig_Filter('if_undefined', function($value, $default) {
        return $value === null ? $default : $value;
    }));

    return $view;
};

$container['logger'] = function ($c)
{
    $settings = $c->get('settings')['logger'];
    $logger = new \Monolog\Logger($settings['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'] . '/' . $settings['name'] . '.log', \Monolog\Logger::DEBUG));
    return $logger;
};

$settings = $container->get('settings')['db'];
$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($settings);
$capsule->bootEloquent();
$capsule->setAsGlobal();

$container['db'] = function($c) use ($capsule, $settings)
{
    $db = $capsule->getConnection();
    if ($settings['log']) {
        $db->enableQueryLog();
    }
    return $db;
};

$container['mailer'] = function($c)
{
    if (!class_exists('Swift_SendmailTransport')) {
        throw new Exception('Mailer class not found! Run "composer require swiftmailer/swiftmailer" in console.');
    }

    $transport = new Swift_SendmailTransport('/usr/sbin/sendmail -bs');
    return new Swift_Mailer($transport);
};

$container['flash'] = function($c)
{
    return new Slim\Flash\Messages;
};

$container['validator'] = function($c)
{
    if (!class_exists('Illuminate\Validation\Factory')) {
        throw new Exception('Validation class not found! Run "composer require illuminate/validation" in console.');
    }

    $settings = $c->settings['languages'];

    $filesystem = new Illuminate\Filesystem\Filesystem();
    $fileLoader = new Illuminate\Translation\FileLoader($filesystem, $settings['path']);
    $translator = new Illuminate\Translation\Translator($fileLoader, $settings['default']);
    $validator  = new Illuminate\Validation\Factory($translator);

    return $validator;
};
