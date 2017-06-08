<?php

use ZacBranson\Core\App;
use ZacBranson\Core\Database\Connection;


App::bind('config', require '../config.php');

App::bind('database',
    Connection::make(App::get('config')['database'])
);