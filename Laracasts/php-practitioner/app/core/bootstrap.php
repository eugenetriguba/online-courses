<?php declare(strict_types=1);

use App\Core\App;

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

/**
 * A helper to load in views.
 *
 * @param string $viewName - The view name without the extension or path.
 * @param array  $data     - Any data that is would like to set that is used in the view.
 *
 * @return mixed
 */
function view(string $viewName, array $data = [])
{
    extract($data);
    return require("app/views/{$viewName}.view.php");
}

/**
 * A helper to redirect back to a page.
 *
 * @param string $path
 */
function redirect(string $path)
{
    header("Location: /{$path}");
}