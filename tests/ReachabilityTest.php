<?php

namespace Tests;

use Framework\Http\Request;

final class ReachabilityTest extends TestCase
{
    public function test_routes_are_reachable()
    {
        $uris = [
            '/' => 'Homepage',
            '/about' => 'About Page'
        ];

        foreach ($uris as $uri => $expectedText) {
            $output = $this->get($uri);
    
            $this->assertStringContainsString($expectedText, $output);
        }
    }
}