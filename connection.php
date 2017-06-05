<?php

 try {
     // connect to database.
    $handler = new PDO('mysql:host=127.0.0.1;dbname=query-builder', 'root', '');
     $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch (PDOException $e) {
     // print the error messages.
    echo $e->getMessage();
     die();
 }
