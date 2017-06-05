<?php

namespace ZacBranson\SimpleORM;

use ZacBranson\SimpleORM\Database\QueryBuilder;

class Model extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct();
    }
}
