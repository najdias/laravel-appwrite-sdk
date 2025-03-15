<?php

namespace NajDias\AppwriteClient\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \NajDias\AppwriteClient\AppwriteClient
 */
class AppwriteClient extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \NajDias\AppwriteClient\AppwriteClient::class;
    }
}
