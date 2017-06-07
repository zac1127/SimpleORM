<?php

return [
  'database' => [
    'name' => 'query-builder',
    'username' => 'root',
    'password' => '',
    'connection' => 'mysql:host=127.0.0.1',
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ],
  ],
];
