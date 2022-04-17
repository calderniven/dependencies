<?php


require 'vendor/autoload.php';

use VolcanoBase\Dependencies\ExceptionHandler;
use VolcanoBase\Dependencies\Greeter;

ExceptionHandler::register();

(new Greeter('Calder'))->sayHello();

//dd($_SERVER);