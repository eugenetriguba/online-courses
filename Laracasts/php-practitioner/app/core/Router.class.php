<?php declare(strict_types=1);

/**
 * Class Router
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
     * @param $uri
     * @param $controller
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
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
     * @return String
     * @throws Exception
     */
    public function direct(String $uri, String $requestType) : String
    {
        if (array_key_exists($uri, $this->routes[$requestType]))
            return $this->routes[$requestType][$uri];

        throw new Exception('No routes found for this URI');
    }
}