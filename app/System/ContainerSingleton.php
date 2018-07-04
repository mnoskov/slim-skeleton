<?php

namespace App\System;

class ContainerSingleton
{
    protected static $_container = null;

    public static function run($container)
    {
        if (self::$_container === null) {
            self::$_container = $container;  
        }
 
        return self::$_container;
    }

    public static function getContainer()
    {
        return self::$_container;
    }
 
    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}  
}
