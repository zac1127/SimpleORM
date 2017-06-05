<?php

namespace ZacBranson\SimpleORM;

class User extends Model
{
    protected $table;

    public function __construct()
    {
        $this->table = 'users';
        parent::__construct();
    }
}
