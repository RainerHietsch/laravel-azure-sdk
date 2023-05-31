<?php

namespace Revealit\AzureSdk\Integrations\Connectors;

use Sammyjo20\Saloon\Http\SaloonConnector;

class AzureServiceBusConnector extends SaloonConnector
{
    public function __construct(
        protected string $apiToken,
        protected ?string $serviceBusNamespace = null,
    ){
        $this->withTokenAuth($this->apiToken);
    }
    public function defineBaseUrl(): string
    {
        $serviceBus = $this->serviceBusNamespace ?? config('azure-sdk.default_service_bus_namespace');
        return "https://{$serviceBus}.servicebus.windows.net";
    }

    public function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/atom+xml;type=entry;charset=utf-8',
        ];
    }
}