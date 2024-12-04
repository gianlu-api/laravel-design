<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator\Registries;

use gianluApi\laravelDesign\ConfigGenerator\Contracts\ConfigGeneratorInterface;
use gianluApi\laravelDesign\ConfigGenerator\Enums\GeneratorTypes;
use gianluApi\laravelDesign\Exceptions\GeneratorTypeException;
use Illuminate\Support\Arr;

class ConfigGeneratorRegistry
{

    /**
     * @var array<string, ConfigGeneratorInterface>
     */
    protected array $types = [];

    public function register(GeneratorTypes $type, ConfigGeneratorInterface $configGenerator): self
    {
        $this->types[$type->value] = $configGenerator;

        return $this;
    }

    /**
     * @throws GeneratorTypeException
     */
    public function get(GeneratorTypes $type): ConfigGeneratorInterface
    {
        if ( !Arr::exists($this->types, $type->value) ) {
            GeneratorTypeException::InvalidType();
        }

        return $this->types[$type->value];
    }

}
