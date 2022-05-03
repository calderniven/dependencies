<?php

namespace Framework\Routing;

use Countable;
use Framework\Http\Request;

class Router implements Countable
{
    private array $routes = [];

    public function register(Route $route)
    {
        $this->routes[] = $route;
    }

    public function count(): int
    {
        return count($this->routes);
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