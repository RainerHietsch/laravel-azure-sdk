<?php

namespace Revealit\AzureSdk\Integrations\Connectors;

use Sammyjo20\Saloon\Http\SaloonConnector;

class AzureAuthenticationConnector extends SaloonConnector
{
    public function defineBaseUrl(): string
    {
        return 'https://login.microsoftonline.com/';
    }

    public function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
    }
}