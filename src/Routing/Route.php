<?php

namespace Framework\Routing;

use Framework\Application\Application;

class Route
{
    public function __construct(
        public string $method,
        public string $uri,
        public string $controller,
        public string $function,
    ){}

    public function run(): string
    {
        $controller = new $this->controller();
        
        return $controller->{$this->function}();
    }

    public static function get(string $uri, string $controller, string $function)
    {
        app()->router->register(
            new Route('GET', $uri, $controller, $function)
        );
    }
}