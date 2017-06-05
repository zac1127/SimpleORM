<?php

namespace App;

use PDO;

class App
{
    private static $query;
    private static $attributes = [];

    protected static $db;
    protected static $table;

    public static function all()
    {
        self::$query = 'SELECT * FROM `'.self::$table.'`';

        return self::run();
    }

    public static function where($feild, $operator, $attribute)
    {
        self::$query = 'SELECT * FROM `'.self::$table.'` WHERE `'.$feild.'` '.$operator.' :attribute';
        self::$attributes[':attribute'] = $attribute;

        return self::run();
    }

    public static function find($id)
    {
        self::$query = 'SELECT * FROM `'.self::$table.'` WHERE `id` = :id LIMIT 1';
        self::$attributes[':id'] = $id;

        return self::run();
    }

    public static function first()
    {
        self::$query = 'SELECT * FROM `'.self::$table.'` ORDER BY `id` asc LIMIT 1';

        return self::run();
    }

    public static function second()
    {
        self::$query = 'SELECT * FROM `'.self::$table.'` ORDER BY `id` asc LIMIT 1, 1';

        return self::run();
    }

    public static function last()
    {
        self::$query = 'SELECT * FROM `'.self::$table.'` ORDER BY `id` desc LIMIT 1';

        return self::run();
    }

    //  UNDER CONSTRUCTION
    // public static function order_by($key, $direction)
    // {
    //     $order = "{$this->query} ORDER BY {$key} {$direction}";

    //     return self::run();
    // }

    public static function run()
    {
        try {
            $prepare = self::$db->prepare(self::$query);
            $prepare->execute(self::$attributes);
            $obj = $prepare->fetchAll(PDO::FETCH_OBJ);

            return $obj;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
