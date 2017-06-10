<?php

namespace ZacBranson\Core;

class Route
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;

        require "../{$file}";

        return $router;
    }

    public function get($uri, $controller)
    {

        $this->routes['GET'][$uri] = $controller;

        return $this;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {

            $params = preg_split("/[\@,]+/", $this->routes[$requestType][$uri]);

            return $this->callAction(
                'ZacBranson\SimplePHP\Controllers\\' . $params[0], $params[1]
            );
        }
        return view('404');
    }

    private function callAction($controller, $action)
    {
        $controller = new $controller;

        if (! method_exists($controller, $action)) {
            throw new Exception(
                $controller . " does not respond to the {$action} action."
            );
        }

        return $controller->$action();
    }
}
