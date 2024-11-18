<?php declare(strict_types=1);

namespace GianluApi\LaravelDesign\Test;

use gianluApi\laravelDesign\Providers\LaravelDesignServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function getPackageProviders($app): array
    {
        return [
            LaravelDesignServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('laravel-design', require __DIR__ . '/../config/laravel-design.php');
    }

    function setConfig(array $configBody): void
    {
        config()->set('laravel-design', $configBody);
    }

}
