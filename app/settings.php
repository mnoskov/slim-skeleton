<?php

$storage = __DIR__ . '/../storage';

return [
    'settings' => array_merge([
        'app' => [
            'version' => '0.1.0',
        ],

        'mailer' => [
            'sender' => 'mail@mnoskov.ru',
        ],

        'migrations' => [
            'path'  => $storage . '/migrations',
            'seeds' => $storage . '/seeds',
            'table' => 'migrations',
        ],

        'languages' => [
            'path'    => __DIR__ . '/../languages',
            'default' => 'en',
        ],

        // monolog settings
        'logger' => [
            'name' => 'app',
            'path' => $storage . '/logs',
        ],
    ], include __DIR__ . '/environment.php')
];
