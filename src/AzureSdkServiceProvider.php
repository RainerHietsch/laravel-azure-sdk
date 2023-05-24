<?php

namespace Revealit\AzureSdk;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Revealit\AzureSdk\Commands\AzureSdkCommand;

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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-azure-sdk_table')
            ->hasCommand(AzureSdkCommand::class);
    }
}
