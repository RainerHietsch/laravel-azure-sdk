<?php

namespace Revealit\AzureSdk\Integrations\Requests;

use Revealit\AzureSdk\Integrations\Connectors\AzureServiceBusConnector;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Traits\Plugins\HasJsonBody;

class PushToQueueRequest extends SaloonRequest
{
    use HasJsonBody;

    protected ?string $method = 'POST';

    protected ?string $connector = AzureServiceBusConnector::class;

    public function __construct(
        protected string $queue,
        protected string $message,
    ){}

    public function defineEndpoint(): string
    {
        return "/{$this->queue}/messages";
    }

    public function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/atom+xml;type=entry;charset=utf-8',
        ];
    }

    public function defaultData(): array
    {
        return [
            'message' => $this->message
        ];
    }
}