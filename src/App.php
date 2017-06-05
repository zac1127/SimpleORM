<?php

namespace App;

use PDO;

class App
{
    private $query;
    private $attributes = [];

    protected $db;
    protected $table;

    public function all()
    {
        $this->query = 'SELECT * FROM `'.$this->table.'`';

        return $this->run();
    }

    public function where($feild, $operator, $attribute)
    {
        $this->query = 'SELECT * FROM `'.$this->table.'` WHERE `'.$feild.'` '.$operator.' :attribute';
        $this->attributes[':attribute'] = $attribute;

        return $this->run();
    }

    public function find($id)
    {
        $this->query = 'SELECT * FROM `'.$this->table.'` WHERE `id` = :id LIMIT 1';
        $this->attributes[':id'] = $id;

        return $this->run();
    }

    public function first()
    {
        $this->query = 'SELECT * FROM `'.$this->table.'` ORDER BY `id` asc LIMIT 1';

        return $this->run();
    }

    public function second()
    {
        $this->query = 'SELECT * FROM `'.$this->table.'` ORDER BY `id` asc LIMIT 1, 1';

        return $this->run();
    }

    public function last()
    {
        $this->query = 'SELECT * FROM `'.$this->table.'` ORDER BY `id` desc LIMIT 1';

        return $this->run();
    }

    //  UNDER CONSTRUCTION
    // public   function order_by($key, $direction)
    // {
    //     $order = "{$this->query} ORDER BY {$key} {$direction}";

    //     return $this->run();
    // }

    public function run()
    {
        try {
            $prepare = $this->db->prepare($this->query);
            $prepare->execute($this->attributes);
            $obj = $prepare->fetchAll(PDO::FETCH_ASSOC);

            return json_encode($obj);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
