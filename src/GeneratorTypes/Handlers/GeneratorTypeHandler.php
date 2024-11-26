<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\GeneratorTypes\Handlers;

use gianluApi\laravelDesign\Commands\Callers\CommandCaller;
use gianluApi\laravelDesign\GeneratorTypes\Enums\GeneratorTypes;
use gianluApi\laravelDesign\GeneratorTypes\GeneratorTypeConfigGenerator;

class GeneratorTypeHandler
{

    /** @var array<string, GeneratorTypes> */
    protected array $mapping = [
        "classes" => GeneratorTypes::CustomClass,
        "models" => GeneratorTypes::Model,
        "interfaces" => GeneratorTypes::Interface,
        "abstract_classes" => GeneratorTypes::AbstractClass,
        "controllers" => GeneratorTypes::Controller,
        "requests" => GeneratorTypes::Request,
        "middlewares" => GeneratorTypes::Middleware,
        "resources" => GeneratorTypes::Resource,
        "blade_views" => GeneratorTypes::Blade,
        "vue_components" => GeneratorTypes::Vue,
        "migrations" => GeneratorTypes::Migration,
        "react_components" => GeneratorTypes::React,
    ];

    /**
     * @param array<string, array<string, mixed>> $configs
     */
    public function process(array $configs): void
    {
        foreach ( $configs as $key => $config ) {
            if( in_array($key, array_keys($this->mapping)) ) {
                self::handleConfigItem($config, $this->mapping[ $key ]);
            }
        }
    }

    /**
     * @param array<string, mixed> $config
     */
    protected static function handleConfigItem(array $config, GeneratorTypes $type): void
    {
        foreach ( $config as $item ) {
            if ( is_array($item) ) {
                /** @var array<string, string> $item */
                $config = GeneratorTypeConfigGenerator::generate($item, $type);
                CommandCaller::call($config, $type);
            }
        }
    }

}
