<?php

use ZacBranson\SimpleORM\User;

$user = new User();


  var_dump(User::where("id", "<=", "3"));
