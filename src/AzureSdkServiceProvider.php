<?php

namespace Revealit\AzureSdk;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AzureSdkServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-azure-sdk')
            ->hasConfigFile();
    }

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
