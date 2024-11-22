<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Selectors;

use gianluApi\laravelDesign\GeneratorTypes\Enums\GeneratorTypes;

final class CommandSelector
{

    public static function handle(GeneratorTypes $type): string
    {
        return match ( $type ) {
            GeneratorTypes::Migration => "make:migration",
            GeneratorTypes::CustomClass => "make:class",
            GeneratorTypes::Interface => "make:interface",
            GeneratorTypes::AbstractClass => "make:class:abstract",
            GeneratorTypes::Model => "make:model",
            GeneratorTypes::Controller => "make:controller",
            GeneratorTypes::Request => "make:request",
            GeneratorTypes::Resource => "make:resource",
            GeneratorTypes::Middleware => "make:middleware",
            GeneratorTypes::Blade => "make:view",
            GeneratorTypes::Vue => "make:view:vue",
            GeneratorTypes::React => "make:view:react",
        };
    }

}
