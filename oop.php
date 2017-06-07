<?php

use ZacBranson\SimpleORM\User;

$user = new User;

dd($user->select('name')->run());
