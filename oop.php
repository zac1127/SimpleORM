<?php

use App\User;

$user = new User($handler);

// echo '------- Where -------';
// print_r(User::where('id', '=', '3'));

echo '------- first -------';
print_r(User::second());
