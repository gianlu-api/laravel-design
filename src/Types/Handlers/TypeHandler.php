<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Types\Handlers;

use gianluApi\laravelDesign\Commands\Callers\CommandCaller;
use gianluApi\laravelDesign\Types\Enums\Types;
use gianluApi\laravelDesign\Types\TypeConfigGenerator;

class TypeHandler
{

    /** @var array<string, Types> */
    protected array $mapping = [
        "classes" => Types::CustomClass,
        "models" => Types::Model,
        "interfaces" => Types::Interface,
        "abstract_classes" => Types::AbstractClass,
        "controllers" => Types::Controller,
        "requests" => Types::Request,
        "middlewares" => Types::Middleware,
        "resources" => Types::Resource,
        "blade_views" => Types::Blade,
        "vue_components" => Types::Vue,
        "migrations" => Types::Migration,
        "react_components" => Types::React,
    ];

    /**
     * @param array<string, array<string, mixed>> $config
     */
    public function process(array $config): void
    {
        foreach ( $this->mapping as $key => $type ) {
            if ( !empty($config[ $key ]) ) {
                self::handleItems($config[ $key ], $type);
            }
        }
    }

    /**
     * @param array<string, mixed> $items
     */
    protected static function handleItems(array $items, Types $type): void
    {
        foreach ( $items as $item ) {
            if ( is_array($item) ) {
                $config = TypeConfigGenerator::generate($item, $type);
                CommandCaller::call($config, $type);
            }
        }
    }

}
