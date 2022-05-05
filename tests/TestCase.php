<?php

namespace Tests;

use Framework\Application\Application;
use Framework\Http\Request;
use PHPUnit\Framework\TestCase as FrameworkTestCase;

class TestCase extends FrameworkTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->setupDummyServer();
    }
    
    public function setupDummyServer()
    {
        $_SERVER = [
            'REQUEST_URI' => '/',
            'REQUEST_METHOD' => 'GET',
        ];

        new Application;
    }

    public function get(string $uri): string
    {
        $_SERVER['REQUEST_URI'] = $uri;
        $app = app();

        ob_start();
        $app->request = new Request($_SERVER);
        $app->boot();
        $app->run();
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}