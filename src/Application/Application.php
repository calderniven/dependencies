<?php

namespace Framework\Application;

use Framework\Exceptions\Handler;
use Framework\Http\Controllers\MainController;
use Framework\Http\Request;
use Framework\Routing\Route;
use Framework\Routing\Router;

class Application
{
    public Request $request;
    public Router $router;

    public function __construct()
    {
        Handler::register();
        
        $this->request = new Request($_SERVER);
        $this->router = new Router();
    }
    
    public function boot()
    {
        $this->router->register(new Route('GET', '/', MainController::class, 'showHomePage'));
        
        $this->router->register(new Route('GET', '/about', MainController::class, 'showAboutPage'));
    }
    
    public function run()
    {
        $route = $this->router->matches($this->request);

        if ($route == null) {
            echo '404 page not found';
            exit;
        }

        echo $route->run();
    }
}
