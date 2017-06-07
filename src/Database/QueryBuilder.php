<?php

namespace Zacbranson\SimpleORM\Database;

use Zacbranson\SimpleORM\App;
use PDO;

class QueryBuilder
{
    private $query;
    private $attributes = [];

    protected $db;
    protected $table;

    /**
     * QueryBuilder Constructor.
     *
     */
    public function __construct()
    {
        $this->db = App::get('database');
    }

    /**
     * Returns all from the table
     *
     *
     * @return this->run() - runs the query.
     */
    public function all()
    {
        $this->query = 'SELECT * FROM `'.$this->table.'`';

        return $this->run();
    }

    /**
     * Restricts query on WHERE condition
     *
     * @param $field             - database field
     * @param $operator          - operator entered for condition
     * @param $attribute         - attribute compared on the field
     *
     * @return instance of query
     */
    public static function where($feild, $operator, $attribute)
    {

        $instance = new static;

        $instance->query = 'SELECT * FROM `'.$instance->table.'` WHERE `'.$feild.'` '.$operator.' :attribute';
        $instance->attributes[':attribute'] = $attribute;

        return $instance;
    }

    /**
     * Finds row from uqique ID
     *
     * @param $id - unique ID of table row
     *
     * @return runs the query.
     */
    public static function find($id)
    {
        $instance = new static;

        $instance->query = 'SELECT * FROM `'.$instance->table.'` WHERE `id` = :id LIMIT 1';
        $instance->attributes[':id'] = $id;

        return $instance->run();
    }

    /**
     * Returns first row from collection
     *
     * @return runs the query.
     */
    public function first()
    {
        $this->query = 'SELECT * FROM `'.$this->table.'` ORDER BY `id` asc LIMIT 1';

        return $this->run();
    }

    /**
     * Returns second row from collection
     *
     * @return runs the query.
     */
    public function second()
    {
        $this->query = 'SELECT * FROM `'.$this->table.'` ORDER BY `id` asc LIMIT 1, 1';

        return $this->run();
    }

    /**
     * Returns last row from collection
     *
     * @return runs the query.
     */
    public function last()
    {
        $this->query = 'SELECT * FROM `'.$this->table.'` ORDER BY `id` desc LIMIT 1';

        return $this->run();
    }

    /**
     * Orders the collection
     *
     * @param $key             - Attribute to order
     * @param $direction       - Ascending or Descending
     *
     * @return runs the query.
     */
    public function order_by($key, $direction)
    {
        $this->query = "{$this->query} ORDER BY {$key} {$direction}";

        return $this->run();
    }


    /**
     * Limits the number of results
     *
     * @param $limit_number    - int - how many results to return
     *
     * @return runs the query.
     */
    public function limit($limit_number)
    {
        $this->query = "{$this->query} LIMIT {$limit_number}";

        return $this->run();
    }

    /**
     * Executes the query
     *
     * @return JSON formatted object of database results.
     */
    public function run()
    {
        try {
            $prepare = $this->db->prepare($this->query);
            $prepare->execute($this->attributes);
            $obj = $prepare->fetchAll(PDO::FETCH_OBJ);

            return json_encode($obj);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
