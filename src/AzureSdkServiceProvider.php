<?php

namespace Revealit\AzureSdk;

use Illuminate\Support\ServiceProvider;

class AzureSdkServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if($this->app->runningInConsole())
        {
            $this->publishes([
                __DIR__.'/../config/azure-sdk.php' => config_path('azure-sdk.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/azure-sdk.php', 'azure-sdk');
    }
}
