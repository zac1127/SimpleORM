<?php

/* Pages Controller routes */
$router->get('/', 'PageController@index');
$router->get('/about', 'PageController@about');

/* Users Controller routes */
$router->get('/users', 'UsersController@index');

// Post methods not yet tested
// $router->post('/users', 'UsersController@store');
