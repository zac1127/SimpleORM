<?php

namespace ZacBranson\SimpleORM;

use ZacBranson\SimpleORM\Database\QueryBuilder;

class Model extends QueryBuilder
{
    public function __construct()
    {
        $this->className = get_class($this);
        $this->table = strtolower((new \ReflectionClass($this))->getShortName() . 's');
        parent::__construct();
    }
    
}
