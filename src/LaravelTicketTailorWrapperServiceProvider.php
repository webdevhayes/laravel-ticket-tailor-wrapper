<?php

namespace Webdevhayes\LaravelTicketTailorWrapper;

use Illuminate\Support\ServiceProvider;
use Webdevhayes\LaravelTicketTailorWrapper\Commands\LaravelTicketTailorWrapperCommand;

class LaravelTicketTailorWrapperServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/ticket-tailor-wrapper.php' => config_path('ticket-tailor-wrapper.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ticket-tailor-wrapper.php', 'ticket-tailor-wrapper');
    }
}
