<?php

namespace Tests;

use Exception;

final class HelpersTest extends TestCase
{
    public function test_invalid_view_throws_exception()
    {
        $this->expectException(Exception::class);
        view_path('thisViewDoesNotExist');
    }
}