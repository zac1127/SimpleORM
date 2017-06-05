<?php

use App\User;

$user = new User($handler);

echo '------- FIRST -------';
print_r($user->first());
echo '------- SECOND -------';
print_r($user->second());
echo '------- LAST -------';
print_r($user->last());
echo '------- WHERE -------';
print_r($user->where('id', '2'));
echo '------- ALL -------';
print_r($user->all());
