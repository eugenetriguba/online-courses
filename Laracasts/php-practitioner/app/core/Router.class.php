<?php declare(strict_types=1);

namespace App\Core;

/**
 * Class Router handles all the routing of urls
 * for this application.
 */
class Router
{
    protected $routes;

    public function __construct()
    {
        $this->routes = [
            'GET' => [],
            'POST' => []
        ];
    }

    /**
     * Retrieve all the routes.
     *
     * @return array
     */
    public function getRoutes() : array
    {
        return $this->routes;
    }

    /**
     * Loads in routes by requiring the file
     *
     * @param String $file
     * @return Router this Router with the
     *      routes set
     */
    public static function load(String $file) : Router
    {
        $router = new self;
        require $file;
        return $router;
    }

    /**
     * Add a route to GET
     *
     * @param $uri
     * @param $controller
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * Add a route to POST
     *
     * @param $uri
     * @param $controller
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * @param String $uri
     * @param String $requestType
     *
     * @return String
     * @throws Exception
     */
    public function direct(String $uri, String $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }

        throw new Exception('No routes found for this URI');
    }

    protected function callAction($controller, $action)
    {
        $controllerName = "App\\Controllers\\{$controller}";
        $controller = new $controllerName;

        if (!method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }

        return $controller->$action();
    }
}