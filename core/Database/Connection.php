<?php

namespace ZacBranson\Core\Database;

use PDO;

class Connection
{
    public static function make($config)
    {
        try {
            // connect to database.
            return new PDO(
            $config['connection'].';dbname='.$config['name'],
            $config['username'],
            $config['password'],
            $config['options']
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
