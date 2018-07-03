<?php 

return [
    'displayErrorDetails' => true,

    // View settings
    'view' => [
        'template_path' => __DIR__ . '/../templates',
        'twig' => [
            'cache' => false,//$storage . '/cache/twig',
            'debug' => true,
            'auto_reload' => true,
        ],
    ],

    // Eloquent configuration
    'db' => [
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => '<database>',
        'username'  => '<username>',
        'password'  => '<password>',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
        'log'       => true,
    ],
];
