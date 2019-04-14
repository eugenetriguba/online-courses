<?php declare(strict_types=1);
$name = $_POST['name'];
App::get('database')->insert('users', [
    'name' => $name
]);

header('Location: /');
