<?php

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

function view_path(string $view)
{
    $path = __DIR__ . '/../resources/views/' . $view;
    if (!file_exists($path)) {
        throw new Exception("View $view could not be found.");
    }

    return $path;
}