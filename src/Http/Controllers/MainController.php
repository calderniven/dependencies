<?php

namespace Framework\Http\Controllers;

use Framework\Renderer\Renderer;

class MainController
{
    public function showHomePage()
    {
        return (new Renderer('homepage.html'))->render();
    }

    public function showAboutpage()
    {
        return (new Renderer('about.html'))->render();
    }
}