<?php

// Use htmlspecialchars to fight against SQL injection
// $_GET is a superglobal PHP provides
// So localhost:8000?name=george would output 'Hello george'
$greeting = 'Hello ' . htmlspecialchars($_GET['name']);

$person = [
    'age' => 20,
    'eyeColor' => 'blue',
    'hairColor' => 'brown',
];

// Kills the program and prints info a out $person
// die(var_dump($person));

require 'index.view.php';