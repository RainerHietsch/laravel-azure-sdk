<?php

namespace Revealit\AzureSdk\Tests\Integration;

use Revealit\AzureSdk\AzureSdk;
use Revealit\AzureSdk\Integrations\Connectors\AzureServiceBusConnector;
use Revealit\AzureSdk\Integrations\Requests\GetAuthTokenRequest;
use Revealit\AzureSdk\Integrations\Requests\PushToQueueRequest;
use Revealit\AzureSdk\Tests\TestCase;
use Sammyjo20\Saloon\Http\SaloonResponse;
use GuzzleHttp\Psr7\Response as GuzzleResponse;

class ServiceBusTest extends TestCase
{
    public function testThatTestsAreWorking()
    {
        $this->assertEquals(1,1);
    }

    public function testPushToQueueWithProvidedToken()
    {
        $serviceBus = $this->getMockBuilder(AzureServiceBusConnector::class)
            ->disableOriginalConstructor()
            ->getMock();

        $request = new PushToQueueRequest('test_queue', ['message' => 'test message']);

        // Expect 1 times
        $serviceBus->expects($this->once())
            ->method('send')
            ->willReturn(new SaloonResponse([], $request, new GuzzleResponse()));

        // Expect 0 times, as we already provide a token
        $authRequest = $this->getMockBuilder(GetAuthTokenRequest::class)
            ->getMock();
        $authRequest->expects($this->never())
            ->method('send');

        // no need to mock anything
        $azureSdk = new AzureSdk();
        $response = $azureSdk->pushToQueue('queue_name', ['message' => 'test message'], 'test_service', 'abcd', $serviceBus);

        $this->assertInstanceOf(SaloonResponse::class, $response);
    }

    public function testPushToQueueWithoutToken()
    {
        $serviceBus = $this->getMockBuilder(AzureServiceBusConnector::class)
            ->disableOriginalConstructor()
            ->getMock();

        $request = new PushToQueueRequest('test_queue', ['message' => 'test message']);

        // Expect to send the request
        $serviceBus->expects($this->once())
            ->method('send')
            ->willReturn(new SaloonResponse([], $request, new \GuzzleHttp\Psr7\Response()));

        // Expect 'getAPIToken' to be called once, as we need to grab a new token
        $azureSdk = $this->createPartialMock(AzureSdk::class, ['getAPIToken']);
        $azureSdk->expects($this->once())
            ->method('getAPIToken')
            ->willReturn('abcd');

        $response = $azureSdk->pushToQueue('queue_name', ['message' => 'test message'], 'test_service', null, $serviceBus);

        $this->assertInstanceOf(SaloonResponse::class, $response);
    }

}