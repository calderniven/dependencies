<?php

namespace Framework\Application;

use Framework\Exceptions\Handler;
use Framework\Http\Request;
use Framework\Routing\Router;

class Application
{
    public static Application $shared;

    public Request $request;
    public Router $router;

    public function __construct()
    {
        Handler::register();
        
        $this->request = new Request($_SERVER);
        $this->router = new Router();
        static::$shared = $this;
    }
    
    public function boot()
    {
        require base_path('routes.php');
    }
    
    public function run()
    {
        $route = $this->router->matches($this->request);

        if ($route == null) {
            echo '404 page not found';
            return;
        }

        echo $route->run();
    }
}
