<?php

use ZacBranson\Core\App;
use ZacBranson\Core\Database\Connection;

App::bind('database',
    Connection::make(config('database'))
);