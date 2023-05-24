<?php

namespace Revealit\AzureSdk\Commands;

use Illuminate\Console\Command;

class AzureSdkCommand extends Command
{
    public $signature = 'laravel-azure-sdk';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
