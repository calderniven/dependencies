<?php

use Framework\Application\Application;

require 'vendor/autoload.php';

$app = new Application();

$app->boot();
$app->run();