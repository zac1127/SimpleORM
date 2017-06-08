<?php
  require '../vendor/autoload.php';
  require '../core/bootstrap.php';

use ZacBranson\Core\Router;
use ZacBranson\Core\Request;

Router::load('routes.php')
    ->direct(Request::uri(), Request::method());
