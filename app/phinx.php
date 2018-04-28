<?php

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\ConsoleEvents;
use Phinx\Console\Command;
use Phinx\Config\Config;

$dispatcher = new EventDispatcher();

$dispatcher->addListener(ConsoleEvents::COMMAND, function (ConsoleCommandEvent $event) use ($container) {
    $command = $event->getCommand();
    $name = $command->getName();

    if (strpos($name, 'phinx:') === 0) {
        $c = $container->settings;

        $config = new Config([
            'paths' => [
                'migrations' => $c['migrations']['path'],
                'seeds'      => $c['migrations']['seeds'],
            ],
            'templates' => [
                'file' => $c['view']['template_path'] . '/migration.php.tpl',
            ],
            'migration_base_class' => '\\App\\System\\Migration',
            'environments' => [
                'default_migration_table' => $c['migrations']['table'],
                'default_database' => 'db',
                'db' => [
                    'adapter'   => $c['db']['driver'],
                    'host'      => $c['db']['host'],
                    'name'      => $c['db']['database'],
                    'user'      => $c['db']['username'],
                    'pass'      => $c['db']['password'],
                    'charset'   => 'utf8',
                    'collation' => 'utf8_unicode_ci',
                ]
            ]
        ]);

        $command->setConfig($config);
    }
});

$app->setDispatcher($dispatcher);

$app->addCommands([
    (new Command\Create())->setName('phinx:create'),
    (new Command\Migrate())->setName('phinx:migrate'),
    (new Command\Rollback())->setName('phinx:rollback'),
    (new Command\Status())->setName('phinx:status'),
    (new Command\Breakpoint())->setName('phinx:breakpoint'),
    (new Command\Test())->setName('phinx:test'),
    (new Command\SeedCreate())->setName('phinx:seed_create'),
    (new Command\SeedRun())->setName('phinx:seed_run'),
]);
