<?php

namespace core;

class Route {
    public $action;
    public $controller;
    public $roles;

    public function __construct($action, $controller, $roles = null) {
        $this->action = $action;
        $this->controller = $controller;
        $this->roles = $roles;
    }
}
