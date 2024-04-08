<?php

namespace LencoSDK\Lenco\Tests;

use LencoSDK\Lenco\LencoServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LencoServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('lenco.api_url', 'testing');
        config()->set('lenco.api_token', 'testing');
    }
}
