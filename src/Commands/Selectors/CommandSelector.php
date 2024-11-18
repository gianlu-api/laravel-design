<?php declare(strict_types=1);

namespace gianluApi\laravelDesign\Commands\Selectors;

use gianluApi\laravelDesign\Types\Enums\Types;

final class CommandSelector
{
    public static function handle(Types $type): string
    {
        return match ($type) {
            Types::Migration => "make:migration",
            Types::CustomClass => "make:class",
            Types::Interface => "make:interface",
            Types::AbstractClass => "make:class:abstract",
            Types::Model => "make:model",
            Types::Controller => "make:controller",
            Types::Request => "make:request",
            Types::Resource => "make:resource",
            Types::Middleware => "make:middleware",
            Types::Blade => "make:view",
            Types::Vue => "make:vue",
            Types::React => "make:react",
        };
    }
}
