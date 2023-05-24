<?php

namespace Revealit\AzureSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Revealit\AzureSdk\AzureSdk
 */
class AzureSdk extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Revealit\AzureSdk\AzureSdk::class;
    }
}
