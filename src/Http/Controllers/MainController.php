<?php

namespace Framework\Http\Controllers;

use Framework\Renderer\Renderer;

class MainController
{
    public function showHomePage()
    {
        return view('homepage', [
            'title' => 'Works!',
        ]);
    }

    public function showAboutpage()
    {
        return view('about');
    }
}