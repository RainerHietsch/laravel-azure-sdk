<?php

namespace Revealit\AzureSdk\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Revealit\AzureSdk\AzureSdkServiceProvider;
use Revealit\AzureSdk\Integrations\Connectors\AzureServiceBusConnector;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            AzureSdkServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('azure-sdk.client_id', 'test_client_id');
        config()->set('azure-sdk.tenant_id', 'test_tenant_id');
        config()->set('azure-sdk.client_secret_value', 'test_client_secret');
        config()->set('azure-sdk.default_service_bus_namespace', 'test_service_bus');
    }
}