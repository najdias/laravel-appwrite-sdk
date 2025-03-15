<?php

namespace NajDias\AppwriteClient;

use Appwrite\Client;
use Appwrite\Services\Account;
use Appwrite\Services\Databases;
use Appwrite\Services\Storage;

class AppwriteClient extends Client
{
    public function databases(): Databases
    {
        return new Databases($this);
    }

    public function account(): Account
    {
        return new Account($this);
    }

    public function storage(): Storage
    {
        return new Storage($this);
    }
}
