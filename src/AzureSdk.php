<?php

namespace Revealit\AzureSdk;

use Revealit\AzureSdk\Integrations\Connectors\AzureServiceBusConnector;
use Revealit\AzureSdk\Integrations\Requests\GetAuthTokenRequest;
use Revealit\AzureSdk\Integrations\Requests\PushToQueueRequest;
use Sammyjo20\Saloon\Http\SaloonResponse;

class AzureSdk
{
    public function getAPIToken(): string
    {
        $request = new GetAuthTokenRequest();
        $response = $request->send();
        return json_decode($response->body())->access_token;
    }
    public function pushToQueue(
        string $queue,
        array $message,
        ?string $service_bus = null,
        ?string $token = null,
        ?AzureServiceBusConnector $serviceBusController = null): SaloonResponse
    {
        $apiToken = $token ?? $this->getAPIToken();
        $serviceBusController = $serviceBusController ?? new AzureServiceBusConnector($apiToken, $service_bus);
        return $serviceBusController->send(new PushToQueueRequest($queue, $message));
    }
}
