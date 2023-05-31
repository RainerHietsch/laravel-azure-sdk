<?php

namespace Revealit\AzureSdk\Integrations\Requests;

use Revealit\AzureSdk\Integrations\Connectors\AzureAuthenticationConnector;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Traits\Plugins\HasFormParams;

class GetAuthTokenRequest extends SaloonRequest
{
    use HasFormParams;

    protected ?string $method = 'GET';

    protected ?string $connector = AzureAuthenticationConnector::class;

    public function defineEndpoint(): string
    {
        $tenantId = config('azure-sdk.tenant_id');
        return "/{$tenantId}/oauth2/token";
    }

    public function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
    }

    public function defaultData(): array
    {
        return [
            'grant_type' => 'client_credentials',
            'resource' => 'https://servicebus.azure.net',
            'client_id' => config('azure-sdk.client_id'),
            'client_secret' => config('azure-sdk.client_secret_value')
        ];
    }
}