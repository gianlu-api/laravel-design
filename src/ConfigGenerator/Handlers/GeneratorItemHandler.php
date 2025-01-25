<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator\Handlers;

use gianluApi\laravelDesign\Commands\Callers\CommandCaller;
use gianluApi\laravelDesign\ConfigGenerator\Enums\GeneratorTypes;
use gianluApi\laravelDesign\ConfigGenerator\Registries\ConfigGeneratorRegistry;
use gianluApi\laravelDesign\Exceptions\GeneratorTypeException;
use Illuminate\Support\Arr;

class GeneratorItemHandler
{

    public function __construct(private readonly ConfigGeneratorRegistry $configGeneratorRegistry) {}

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
     * @param string|null $name
     *
     * @throws GeneratorTypeException
     */
    public function process(array $configs, ?string $name = null): void
    {
        foreach ( $configs as $key => $config ) {
            if ( Arr::exists($this->mapping, $key) ) {
                $this->handleConfigItem($config, $this->mapping[$key], $name);
            }
        }
    }

    /**
     * @param array<string, mixed> $config
     * @param GeneratorTypes $type
     * @param string|null $name
     *
     * @throws GeneratorTypeException
     */
    protected function handleConfigItem(array $config, GeneratorTypes $type, ?string $name = null): void
    {
        $configItem = $this->configGeneratorRegistry->get($type)->generate($config, $name);

        foreach ( $configItem as $item ) {
            CommandCaller::call($item, $type);
        }
    }

}
