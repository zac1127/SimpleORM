<?php

use ZacBranson\SimpleORM\App;
use ZacBranson\SimpleORM\Database\Connection;

App::bind(
  'config', require 'config.php'
);

App::bind(
  'database',
   Connection::make(App::get('config')['database'])
);
