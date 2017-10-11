<?php

namespace App\Controllers;

class Controller {

    protected $container;
    protected $view;

    public function __construct($container) {
        $this->container = $container;
        $this->view = $container->get('view');
    }

}

