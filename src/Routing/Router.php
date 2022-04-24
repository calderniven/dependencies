<?php

namespace Framework\Routing;

use Framework\Http\Request;

class Router
{
    private array $routes = [];

    public function register(Route $route)
    {
        $this->routes[] = $route;
    }

    public function matches(Request $request): ?Route
    {
        foreach ($this->routes as $route) {
            if ($route->uri == $request->uri) {
                return $route;
            }
        }
        
        return null;
    }
}