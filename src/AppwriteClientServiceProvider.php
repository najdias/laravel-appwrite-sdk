<?php

namespace NajDias\AppwriteClient;

use NajDias\AppwriteClient\Commands\AppwriteClientCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AppwriteClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-appwrite-sdk')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_appwrite_sdk_table')
            ->hasCommand(AppwriteClientCommand::class);
    }
}
