<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command as SymphonyCommand;

class Command extends SymphonyCommand
{
    use \App\System\ContainerTrait {
        __construct as containerConstruct;
    }

    public function __construct(\Slim\Container $container, $name = null)
    {
        $this->containerConstruct($container);
        parent::__construct($name);
    }
}
