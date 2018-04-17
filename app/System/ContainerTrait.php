<?php

namespace App\System;

trait ContainerTrait
{
    protected $ci;

    public function __construct($ci)
    {
        $this->ci = $ci;
    }
}
