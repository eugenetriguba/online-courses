<?php

return [
    'database' => [
        'name' => 'php101App',
        'username' => 'root',
        'password' => '',
        'connection' => 'mysql:host=127.0.0.1;dbname=users',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];