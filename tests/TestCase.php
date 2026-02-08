<?php

namespace Webdevhayes\LaravelTicketTailorWrapper\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Webdevhayes\LaravelTicketTailorWrapper\LaravelTicketTailorWrapperServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelTicketTailorWrapperServiceProvider::class,
        ];
    }
}
