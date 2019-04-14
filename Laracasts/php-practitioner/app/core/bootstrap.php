<?php declare(strict_types=1);

App::bind('config', require 'config.php');
App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));