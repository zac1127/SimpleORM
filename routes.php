<?php

/* Pages Controller routes */
$router->get('/', 'PageController@index');
$router->get('/about', 'PageController@about');

/* Users Controller routes */
$router->get('/users/about', 'UsersController@index');
$router->post('/add_name', 'nameController@add_name');

// Post methods not yet tested
// $router->post('/users', 'UsersController@store');
