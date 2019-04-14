<?php declare(strict_types=1);

$users = App::get('database')->selectAll('users');

require 'views/index.view.php';