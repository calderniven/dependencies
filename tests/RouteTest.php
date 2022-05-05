<?php

namespace Tests;

use Framework\Http\Controllers\MainController;
use Framework\Routing\Route;

final class RouteTest extends TestCase
{
    public function test_route_can_be_constructed()
    {
        $route = new Route('dummyMethod', 'dummyUri', 'dummyController', 'dummyFunction');

        $this->assertInstanceOf(Route::class, $route);

        $this->assertEquals('dummyMethod', $route->method);
        $this->assertEquals('dummyUri', $route->uri);
    }

    public function test_route_can_run()
    {
        $route = new Route('GET', '/', MainController::class, 'showHomePage');

        $controller = new $route->controller();
        
        $this->assertInstanceOf(MainController::class, $controller);
        $this->assertIsString($route->run());
    }
}