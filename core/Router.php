<?php

namespace ZacBranson\Core;

class Router
{

  protected $routes = [];

  public static function load($file)
  {
    $router = new static;

    require $file;

    return $router;
  }

  public function define($route, $controller)
  {
    $this->routes[$route] = $controller;
  }

  public function direct($uri)
  {
    if(array_key_exists($uri, $this->routes))
    {
      return $this->routes[$uri];
    }

    throw new Exception("No Route Found!");
  }
}


 ?>
