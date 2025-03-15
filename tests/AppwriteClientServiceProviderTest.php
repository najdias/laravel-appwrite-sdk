<?php

namespace NajDias\AppwriteClient\Tests;

use NajDias\AppwriteClient\AppwriteClient;
use NajDias\AppwriteClient\AppwriteClientServiceProvider;
use NajDias\AppwriteClient\Exceptions\AppwriteException;

beforeEach(function () {
    $this->provider = new AppwriteClientServiceProvider($this->app);
});

it('registers the Client in the container', function () {
    config()->set('appwrite-sdk', [
        'api' => [
            'endpoint' => 'http://localhost/v1',
            'project_id' => 'project-id',
            'key' => 'key',
        ],
    ]);

    $this->provider->register();

    $client = app(AppwriteClient::class);

    expect($client)->toBeInstanceOf(AppwriteClient::class);
});

it('throws an exception if the API endpoint is missing', function () {
    config()->set('appwrite-sdk', [
        'api' => [
            'project_id' => 'project-id',
            'key' => 'key',
        ],
    ]);

    $this->provider->register();

    app(AppwriteClient::class);
})->throws(AppwriteException::class);

it('throws an exception if the project ID is missing', function () {
    config()->set('appwrite-sdk', [
        'api' => [
            'endpoint' => 'http://localhost/v1',
            'key' => 'key',
        ],
    ]);

    $this->provider->register();

    app(AppwriteClient::class);
})->throws(AppwriteException::class);

it('throws an exception if the API key is missing', function () {
    config()->set('appwrite-sdk', [
        'api' => [
            'endpoint' => 'http://localhost/v1',
            'project_id' => 'project-id',
        ],
    ]);

    $this->provider->register();

    app(AppwriteClient::class);
})->throws(AppwriteException::class);
