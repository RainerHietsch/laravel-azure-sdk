# A PHP Laravel wrapper for the Microsoft Azure REST API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/revealit/laravel-azure-sdk.svg?style=flat-square)](https://packagist.org/packages/revealit/laravel-azure-sdk)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/revealit/laravel-azure-sdk/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/revealit/laravel-azure-sdk/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/revealit/laravel-azure-sdk/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/revealit/laravel-azure-sdk/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/revealit/laravel-azure-sdk.svg?style=flat-square)](https://packagist.org/packages/revealit/laravel-azure-sdk)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-azure-sdk.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/laravel-azure-sdk)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require revealit/laravel-azure-sdk
```

You can publish the config file with:

```bash
php artisan vendor:publish
```

and then entering the number of the ServiceProvider

This is the contents of the published config file:

```php
return [

    /*
     * The Application (client) ID
     */
    "client_id" => "",

    /*
     * Directory (tenant) ID
     */
    "tenant_id" => "",

    /*
     * The apps secret value. This value is only visible immediately after creation,
     * so be sure to note it down.
     */
    "client_secret_value" => ""
    
    /*
     * The default service bus to use.
     */
    "default_service_bus_namespace" => ""

];

```

## Usage

Edit `azure-sdk.php` in the Laravel `config` folder, and enter your Apps keys and secret.

```php
// Send a message to a queue
return AzureSdk::pushToQueue("test_queue", "Hello World!")->status();
```

This will generate a token and send a message to the queue specified in the first parameter.

You can also send a message to a different service bus:
```php
// Send a message to a queue in a different service bus
return AzureSdk::pushToQueue("test_queue", "Hello World!", "different_service_bus")->status();
```

If you want to send multiple messages, you can generate a token first and pass it in as an optional forth parameter:
```php
// Send messages to different queues using the same token
$token = AzureSdk::getAPIToken();
$serviceBus = congig("azure-sdk.default_service_bus_namespace");
AzureSdk::pushToQueue("test_queue", "Hello World!", $serviceBus, $token)->status();
AzureSdk::pushToQueue("test_queue_2", "Another Message", $serviceBus, $token)->status();
```

## Testing

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Rainer Hietsch](https://github.com/rainerhietsch)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
