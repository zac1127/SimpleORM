<?php

use App\User;

$user = new User($handler);

// echo '------- Where -------';
print_r($user->where('id', '>=', '3'));
// print_r(User::all());
