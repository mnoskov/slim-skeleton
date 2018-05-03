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

        // monolog settings
        'logger' => [
            'name' => 'app',
            'path' => $storage . '/logs',
        ],
    ], include __DIR__ . '/environment.php')
];
