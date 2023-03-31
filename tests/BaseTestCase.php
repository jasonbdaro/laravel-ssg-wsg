<?php

namespace Jasonbdaro\Ssgwsg\Tests;

use Orchestra\Testbench\TestCase;
use Jasonbdaro\Ssgwsg\SsgwsgServiceProvider;

class BaseTestCase extends TestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array<int, class-string<\Illuminate\Support\ServiceProvider>>
     */
    protected function getPackageProviders($app)
    {
        return [SsgwsgServiceProvider::class];
    }
}
