<?php declare(strict_types=1);

require 'vendor/autoload.php';
require 'core/bootstrap.php';
require Router::load('routes.php')
    ->direct(Request::uri(), Request::method());