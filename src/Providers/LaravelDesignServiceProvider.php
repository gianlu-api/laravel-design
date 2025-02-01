<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Providers;

use gianluApi\laravelDesign\Commands\Console\AbstractClassMakeCommand;
use gianluApi\laravelDesign\Commands\Console\ClassMakeCommand;
use gianluApi\laravelDesign\Commands\Console\DesignMakeCommand;
use gianluApi\laravelDesign\Commands\Console\InterfaceMakeCommand;
use gianluApi\laravelDesign\Commands\Console\Laravel\ControllerMakeCommand;
use gianluApi\laravelDesign\Commands\Console\Laravel\MiddlewareMakeCommand;
use gianluApi\laravelDesign\Commands\Console\Laravel\RequestMakeCommand;
use gianluApi\laravelDesign\Commands\Console\Laravel\ResourceMakeCommand;
use gianluApi\laravelDesign\Commands\Console\Views\ReactMakeCommand;
use gianluApi\laravelDesign\Commands\Console\Views\VueMakeCommand;
use gianluApi\laravelDesign\ConfigGenerator\ControllerConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\CustomCommandConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\Enums\GeneratorTypes;
use gianluApi\laravelDesign\ConfigGenerator\LaravelCommandConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\MigrationConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\Registries\ConfigGeneratorRegistry;
use gianluApi\laravelDesign\ConfigGenerator\VueConfigGenerator;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;

class LaravelDesignServiceProvider extends ServiceProvider
{

    /**
     * @throws BindingResolutionException
     */
    public function boot(): void
    {
        $this->publishes([ __DIR__ . '/../../config/laravel-design.php' => config_path('laravel-design.php') ], 'gianlu-api:laravel-design:config');

        $this->commands([
            DesignMakeCommand::class,
            ClassMakeCommand::class,
            InterfaceMakeCommand::class,
            AbstractClassMakeCommand::class,
            VueMakeCommand::class,
            ReactMakeCommand::class,
            ControllerMakeCommand::class,
            RequestMakeCommand::class,
            MiddlewareMakeCommand::class,
            ResourceMakeCommand::class
        ]);

        $this->configGenerator();
    }

    public function register(): void
    {
        $this->app->singleton(ConfigGeneratorRegistry::class);
    }

    /**
     * @throws BindingResolutionException
     */
    private function configGenerator(): void
    {
        $this->app->make(ConfigGeneratorRegistry::class)
            ->register(GeneratorTypes::Model, $this->app->make(LaravelCommandConfigGenerator::class))
            ->register(GeneratorTypes::Middleware, $this->app->make(LaravelCommandConfigGenerator::class))
            ->register(GeneratorTypes::Resource, $this->app->make(LaravelCommandConfigGenerator::class))
            ->register(GeneratorTypes::Request, $this->app->make(LaravelCommandConfigGenerator::class))
            ->register(GeneratorTypes::Blade, $this->app->make(LaravelCommandConfigGenerator::class))
            ->register(GeneratorTypes::Migration, $this->app->make(MigrationConfigGenerator::class))
            ->register(GeneratorTypes::Controller, $this->app->make(ControllerConfigGenerator::class))
            ->register(GeneratorTypes::CustomClass, $this->app->make(CustomCommandConfigGenerator::class))
            ->register(GeneratorTypes::AbstractClass, $this->app->make(CustomCommandConfigGenerator::class))
            ->register(GeneratorTypes::Interface, $this->app->make(CustomCommandConfigGenerator::class))
            ->register(GeneratorTypes::Vue, $this->app->make(VueConfigGenerator::class))
            ->register(GeneratorTypes::React, $this->app->make(CustomCommandConfigGenerator::class));
    }

}
