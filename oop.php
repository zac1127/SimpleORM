<?php

use ZacBranson\SimpleORM\User;

$user = new User;

dd($user->all()->count());
