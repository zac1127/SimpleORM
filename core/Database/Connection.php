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
            echo 'error creating database connection<br>';
            die($e->getMessage());
        }
    }
}
