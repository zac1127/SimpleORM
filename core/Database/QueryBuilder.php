<?php

namespace Zacbranson\Core\Database;

use Zacbranson\Core\App;
use JsonSerializable;
use PDO;

class QueryBuilder implements JsonSerializable
{
    private $query;

    private $attributes = [];

    protected $db;

    protected $table;

    protected $output;

    protected $className;

    /**
     * QueryBuilder Constructor.
     *
     */
    public function __construct($model)
    {
        $this->className = get_class($model);
        $this->table = strtolower((new \ReflectionClass($model))->getShortName() . 's');
        $this->db = App::get('database');
    }

    /**
     * Returns all from the table
     *
     *
     * @return this->get() - runs the query.
     */
    public function all()
    {

        $this->query = 'SELECT * FROM `'.$this->table.'`';

        return $this;
    }

    /**
     * Select Query with constraints
     *
     *
     * @return $this
     */
    public function select(...$parameters)
    {
        $query = 'SELECT ';

        foreach($parameters as $key => $value)
        {
          $query .= '`'.$value.'`';
          if($key != count($parameters)-1)
            $query .= ',';
        }

        $query .= ' FROM `'.$this->table.'`';

        $this->query = $query;

        return $this;
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
    public function where(...$parameters)
    {
        if(count($parameters) == 3){
          $field = $parameters[0];
          $operator = $parameters[1];
          $attribute = $parameters[2];
        } else {
          $field = $parameters[0];
          $operator = "=";
          $attribute = $parameters[1];
        }

        $this->query = 'SELECT * FROM `'.$this->table.'` WHERE `'.$field.'` '.$operator.' :attribute';
        $this->attributes[':attribute'] = $attribute;

        return $this;
    }

    /**
     * Finds row from uqique ID
     *
     * @param $id - unique ID of table row
     *
     * @return runs the query.
     */
    public function find($id)
    {
        return $this->where('id', '=', $id)->first()->get();
    }

    /**
     * Returns first row from collection
     *
     * @return runs the query.
     */
    public function first()
    {
        if($this->query == NULL) {
          $this->query = "SELECT * FROM `'.$this->table.'";
        }

        $this->query .= ' LIMIT 1';

        return $this;
    }

    /**
     * Returns second row from collection
     *
     * @return runs the query.
     */
    public function second()
    {
        $this->query = 'SELECT * FROM `'.$this->table.'` ORDER BY `id` asc LIMIT 1, 1';

        return $this;
    }

    /**
     * Returns last row from collection
     *
     * @return runs the query.
     */
    public function last()
    {
        $this->query = 'SELECT * FROM `'.$this->table.'` ORDER BY `id` desc LIMIT 1';

        return $this;
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

        return $this;
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

        return $this->get();
    }


    /**
     * Updates the table
     *
     * @param $limit_number    - int - how many results to return
     *
     * @return runs the query.
     */
    public function update($values)
    {

        $where = $this->get();

        $query = "UPDATE `{$this->table}` SET ";

        foreach($values as $key => $value)
        {
            $query .= "`{$key}` = :{$key}";


        }

        $query .= " WHERE  `id` = {$where[0]->id}";

        $this->query = $query;
        $this->attributes = $values;

        // dd($this->query);

        return $this->run();
    }


    /**
     * Executes the query
     *
     * @return JSON formatted object of database results.
     */
    public function get()
    {
        try {

            $prepare = $this->db->prepare($this->query);
            $prepare->execute($this->attributes);
            $obj = $prepare->fetchAll(PDO::FETCH_OBJ);
            $this->output = $obj;
            return $obj;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
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
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * counts the number of databse rows found
     *
     * @return int - number of database rows found
     */
    public function count()
    {
      try {
          $prepare = $this->db->prepare($this->query);
          $prepare->execute($this->attributes);
          $obj = $prepare->fetchAll(PDO::FETCH_ASSOC);
          return count($obj);

      } catch (PDOException $e) {
          echo $e->getMessage();
      }
    }


    public function toJson($options = 0)
    {
        $json = json_encode($this->jsonSerialize(), $options);
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw JsonEncodingException::forModel($this, json_last_error_msg());
        }
        return $json;
    }

    public function jsonSerialize() {
      return $this->output;
    }

}
