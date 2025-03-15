<?php

namespace NajDias\AppwriteClient;

use NajDias\AppwriteClient\Exceptions\AppwriteException;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AppwriteClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-appwrite-sdk')
            ->hasConfigFile();
    }

    public function registeringPackage(): void
    {
        $this->app->singleton(AppwriteClient::class, function (): AppwriteClient {
            if (config('appwrite-sdk.api.endpoint') === null) {
                throw AppwriteException::missingApiEndpoint();
            }

            if (config('appwrite-sdk.api.project_id') === null) {
                throw AppwriteException::missingProjectId();
            }

            if (config('appwrite-sdk.api.key') === null) {
                throw AppwriteException::missingApiKey();
            }

            $client = new AppwriteClient;
            $client->setEndpoint(config('appwrite-sdk.api.endpoint'))
                ->setProject(config('appwrite-sdk.api.project_id'))
                ->setKey(config('appwrite-sdk.api.key'));

            return $client;
        });
    }
}
