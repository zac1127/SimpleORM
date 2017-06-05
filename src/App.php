<?php

namespace App;

use PDO;

class App
{
    private $db;
    private static $query;
    private $attributes = [];

    protected $table;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public static function all()
    {
        $this->query = "SELECT * FROM `{$this->table}`";

        return $this->run();
    }

    public function where($feild, $operator, $attribute)
    {
        $this->query = "SELECT * FROM `{$this->table}` WHERE `{$feild}` {$operator} :attribute";
        $this->attributes[':attribute'] = $attribute;

        return $this->run();
    }

    public function find($id)
    {
        $this->query = "SELECT * FROM `{$this->table}` WHERE `id` = :id";
        $this->attributes[':id'] = $id;

        return $this->run();
    }

    public function first()
    {
        $this->query = "SELECT * FROM `{$this->table}` ORDER BY `id` asc LIMIT 1";

        return $this->run();
    }

    public function second()
    {
        $this->query = "SELECT * FROM `{$this->table}` ORDER BY `id` asc LIMIT 1, 1";

        return $this->run();
    }

    public function last()
    {
        $this->query = "SELECT * FROM `{$this->table}` ORDER BY `id` desc LIMIT 1";

        return $this->run();
    }

    //  UNDER CONSTRUCTION
    // public static function order_by($key, $direction)
    // {
    //     $order = "{$this->query} ORDER BY {$key} {$direction}";

    //     return self::run();
    // }

    public function run()
    {
        try {
            $prepare = $this->db->prepare(self::$query);
            $prepare->execute($this->attributes);
            $obj = $prepare->fetchAll(PDO::FETCH_OBJ);

            return $obj;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
