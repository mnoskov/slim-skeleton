<?php 

return [
    'displayErrorDetails' => true,

    // View settings
    'view' => [
        'template_path' => __DIR__ . '/../templates',
        'twig' => [
            'cache' => false,//__DIR__ . '/storage/cache/twig',
            'debug' => true,
            'auto_reload' => true,
        ],
    ],

    // Eloquent configuration
    'db' => [
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'db',
        'username'  => 'user',
        'password'  => 'pass',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
        'log'       => true,
    ],
];
