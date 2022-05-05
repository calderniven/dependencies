<?php

use Framework\Application\Application;
use Framework\Renderer\Renderer;

function app(): Application
{
    return Application::$shared;
}

// @codeCoverageIgnoreStart
function dd($variable)
{
    echo '<pre style="background-color:black; color:white; padding:7px; font-size: 14px;">';
    if (is_string($variable)) {
        $variable = htmlspecialchars($variable);
    }
    var_dump($variable);
    echo '</pre>';
    die();
}
// @codeCoverageIgnoreEnd

function base_path(string $fileName)
{
    $path = __DIR__ . '/' . $fileName;
    
    return $path;
}

function view_path(string $view)
{
    $path = __DIR__ . '/../resources/views/' . $view;
    if (!file_exists($path)) {
        throw new Exception("View $view could not be found.");
    }
    
    return $path;
}

function view(string $view, array $slots = [])
{
    $body = (new Renderer("$view.html"))->render($slots);

    return (new Renderer("layout.html"))
        ->render(array_merge($slots, ['content' => $body]
    ));
}