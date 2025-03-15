<?php

namespace NajDias\AppwriteClient\Commands;

use Illuminate\Console\Command;

class AppwriteClientCommand extends Command
{
    public $signature = 'laravel-appwrite-sdk';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
