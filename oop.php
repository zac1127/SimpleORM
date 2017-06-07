<?php

use ZacBranson\SimpleORM\User;

$user = new User();


dd(
  User::where("id", "<=", "3")
        ->order_by("id", "desc")
  );
