<?php

namespace App;

class User extends App
{
    public function __construct($db)
    {
        $this->table = 'users';
        $this->db = $db;
    }
}
