<?php declare(strict_types=1);

namespace Tests;

use Framework\Application\Application;
use Framework\Http\Request;

final class ApplicationTest extends TestCase
{
    public function test_can_be_created()
    {
        $this->assertInstanceOf(Application::class, app());
    }

    public function test_singleton_is_created()
    {
        $this->assertInstanceOf(Application::class, Application::$shared);
    }
}