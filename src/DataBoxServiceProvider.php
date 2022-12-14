<?php

namespace LaravelDataBox;

use LaravelDataBox\Facades\DataBox as DataBoxFacade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DataBoxServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-databox')
            ->hasConfigFile();
    }

    public function packageBooted()
    {
        $this->app->terminating(fn () => DataBoxFacade::sendAll());
    }
}
