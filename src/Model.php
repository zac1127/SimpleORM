<?php

namespace ZacBranson\SimpleORM;

use ZacBranson\SimpleORM\Database\QueryBuilder;

class Model
{
    public function newQuery()
    {
        return new QueryBuilder($this);
    }

    /**
     * Handle dynamic method calls into the model.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        // if (in_array($method, ['increment', 'decrement'])) {
        //     return $this->$method(...$parameters);
        // }
        return $this->newQuery()->$method(...$parameters);
    }

    /**
     * Handle dynamic static method calls into the method.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        return (new static)->$method(...$parameters);
    }

}
