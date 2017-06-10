<?php

use ZacBranson\Core\Route;


/* Pages Controller routes */
$router->get('/', 'PageController@index');
$router->get('/about', 'PageController@about');

/* Users Controller routes */
$router->get('/users', 'UsersController@index');


// Route::post('/add_name', 'nameController@add_name');
