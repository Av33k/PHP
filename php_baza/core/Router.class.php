<?php

namespace core;

class Router {
    private $routes = [];
    private $defaultRoute = null;
    private $loginRoute = null;
    private $action = null;

    public function setDefaultRoute($route) {
        $this->defaultRoute = $route;
    }

    public function setLoginRoute($route) {
        $this->loginRoute = $route;
    }

    public function addRoute($action, $controller, $roles = null) {
        $this->routes[$action] = new Route($action, $controller, $roles);
    }

    public function setAction($action) {
        $this->action = $action;
    }

    public function go() {
        $action = $this->action ?? $this->defaultRoute;
        if (isset($this->routes[$action])) {
            $route = $this->routes[$action];
            $controllerClass = "app\\controllers\\" . $route->controller;
            $controller = new $controllerClass();
            if (method_exists($controller, 'generateView')) {
                $controller->generateView();
            }
        }
    }
}
