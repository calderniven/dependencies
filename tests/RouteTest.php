<?php

namespace Tests;

use Framework\Application\Application;
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
        $this->assertEquals('dummyController', $route->controller);
        $this->assertEquals('dummyFunction', $route->function);
    }

    public function test_route_can_run()
    {
        $route = new Route('GET', '/', MainController::class, 'showHomePage');

        $controller = new $route->controller();

        $this->assertInstanceOf(MainController::class, $controller);
        $this->assertStringContainsString('showHomePage', $route->function);
    }
}