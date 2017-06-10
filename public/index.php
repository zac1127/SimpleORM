<?php
  require '../vendor/autoload.php';
  require '../core/bootstrap.php';

  use ZacBranson\Core\Route;
  use ZacBranson\Core\Request;

  Route::load('routes.php')
      ->direct(Request::uri(), Request::method());
