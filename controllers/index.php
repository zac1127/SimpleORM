<?php


  use ZacBranson\SimplePHP\User;

  $users = User::all()->run();


  require 'views/index.view.php';

 ?>
