<?php

namespace Framework\Routing;

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
}