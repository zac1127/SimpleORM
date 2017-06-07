<?php


  require './vendor/autoload.php';
  require './core/bootstrap.php';


  /*Router*/
  $uri = trim($_SERVER['REQUEST_URI'], '/');
  require ZacBranson\Core\Router::load('routes.php')
                                  ->direct($uri);
