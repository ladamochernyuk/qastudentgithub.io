<?php

return [ 
   'db' => [
       'driver' => 'mysql',
       'dbname' => 'shop',
       'host' => '127.0.0.1',
       'charset' => 'utf8mb4',
       'port' => 3306
   ],
   'user' => 'root', 
   'password' => '',
   'options' => [
       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
       PDO::ATTR_EMULATE_PREPARES => false
   ]
];