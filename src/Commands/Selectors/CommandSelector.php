<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Selectors;

use gianluApi\laravelDesign\ConfigGenerator\Enums\GeneratorTypes;

final class CommandSelector
{

    public static function handle(GeneratorTypes $type): string
    {
        return match ( $type ) {
            GeneratorTypes::Migration => "make:migration",
            GeneratorTypes::CustomClass => "design:class",
            GeneratorTypes::Interface => "design:interface",
            GeneratorTypes::AbstractClass => "design:class:abstract",
            GeneratorTypes::Model => "make:model",
            GeneratorTypes::Controller => "design:controller",
            GeneratorTypes::Request => "design:request",
            GeneratorTypes::Resource => "design:resource",
            GeneratorTypes::Middleware => "design:middleware",
            GeneratorTypes::Blade => "make:view",
            GeneratorTypes::Vue => "design:view:vue",
            GeneratorTypes::React => "design:view:react",
        };
    }

}
