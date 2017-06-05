<?php

namespace App;

class User extends App
{
    public function __construct($db)
    {
        parent::$table = 'users';
        parent::$db = $db;
    }
}
