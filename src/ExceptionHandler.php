<?php

namespace VolcanoBase\Dependencies;

class ExceptionHandler
{
    public static function register()
    {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }
}
