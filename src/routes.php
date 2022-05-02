<?php

use Framework\Http\Controllers\MainController;
use Framework\Routing\Route;

Route::get('/', MainController::class, 'showHomePage');

Route::get('/about', MainController::class, 'showAboutPage');