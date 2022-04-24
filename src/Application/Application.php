<?php

namespace Framework\Application;

use Framework\Exceptions\Handler;
use Framework\Http\Request;
use Framework\Routing\Route;
use Framework\Routing\Router;
use Framework\Support\Greeter;

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
        $this->router->register(new Route('GET', '/', '', ''));
        $this->router->register(new Route('GET', '/about', '', ''));
    }
    
    public function run()
    {
        
        dd($this->router->matches($this->request));

        $path = view_path('layout.html');
        $content = file_get_contents($path);

        echo $content;
        // if ($this->request->uri == '/') {
        //     (new Greeter('Calder'))->sayHello();
        // }
        // 
        // if ($this->request->uri == '/about') {
        //     (new Greeter('You dirty dawg!'))->sayHello();
        // }
    }
}
