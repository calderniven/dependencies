<?php

namespace Framework\Application;

use Framework\Exceptions\Handler;
use Framework\Http\Request;
use Framework\Support\Greeter;

class Application
{
    public function boot()
    {
        Handler::register();
        $request = new Request($_SERVER);
        dd($request);
    }

    public function run()
    {
        (new Greeter('Calder'))->sayHello();
    }
}
