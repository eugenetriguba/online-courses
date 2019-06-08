<?php declare(strict_types=1);

App::bind('config', require 'config.php');
App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));


function view(string $viewName, array $data = [])
{
    extract($data);
    return require("views/{$viewName}.view.php");
}

function redirect(string $path)
{
    header("Location: /{$path}");
}