<?php declare(strict_types=1);

class Request
{
    /**
     *  Gives back the request URI, parsed and trimmed.
     *
     * @return String the request_uri, trimmed of forward slashes
     *      and parsed for the PHP_URL_PATH.
     */
    public static function uri() : String
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );
    }

    /**
     * Returns the request method
     *
     * @return String the request method (GET, POST, etc.)
     */
    public static function method() : String
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}