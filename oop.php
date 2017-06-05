<?php

use ZacBranson\SimpleORM\User;

$user = new User();
dd($user->first());
// echo '------- Where -------';
print_r($user->all());
