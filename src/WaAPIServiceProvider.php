<?php
namespace WaAPI\WaAPI;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class WaAPIServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-waapi')
            ->hasConfigFile('waapi');
            // DO NOT auto-load routes here (causes Composer LARAVEL_START conflict)
    }

    public function boot()
    {
        parent::boot();

        // Only load routes when Laravel is actually running — NOT during Composer install
        if (! $this->app->runningInConsole()) {
            $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        }
    }
}
