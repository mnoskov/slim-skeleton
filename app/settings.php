<?php
return [
    'settings' => array_merge([
        'app' => [
            'version' => '0.1.0',
        ],

        'mailer' => [
            'sender' => 'mail@mnoskov.ru',
        ],

        // monolog settings
        'logger' => [
            'name' => 'app',
            'path' => __DIR__ . '/storage/app.log',
        ],

        'cache' => [
            'directory' => __DIR__ . '/storage/cache',
        ],
    ], include __DIR__ . '/environment.php')
];
