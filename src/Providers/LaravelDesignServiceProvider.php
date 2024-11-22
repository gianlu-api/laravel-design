<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Providers;

use gianluApi\laravelDesign\Commands\Console\AbstractClassMakeCommand;
use gianluApi\laravelDesign\Commands\Console\ClassMakeCommand;
use gianluApi\laravelDesign\Commands\Console\DesignMakeCommand;
use gianluApi\laravelDesign\Commands\Console\InterfaceMakeCommand;
use gianluApi\laravelDesign\Commands\Console\Views\ReactMakeCommand;
use gianluApi\laravelDesign\Commands\Console\Views\VueMakeCommand;
use Illuminate\Support\ServiceProvider;

class LaravelDesignServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->publishes([ __DIR__ . '/../../config/laravel-design.php' => config_path('laravel-design.php') ], 'gianlu-api:laravel-design:config');

        $this->commands([
            DesignMakeCommand::class,
            ClassMakeCommand::class,
            InterfaceMakeCommand::class,
            AbstractClassMakeCommand::class,
            VueMakeCommand::class,
            ReactMakeCommand::class
        ]);
    }

    public function register(): void
    {

    }

}
