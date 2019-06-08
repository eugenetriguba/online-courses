<?php

return [
    'database' => [
        'name' => 'php101',
        'username' => 'root',
        'password' => 'securepassword',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];