<?php

class Router
{
    private $routes = [];

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function direct($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            return $this->routes[$uri];
        }

        return $this->abort();
    }

    private function abort()
    {
        http_response_code(404);
        require 'views/404.php';
        die();
    }
}
