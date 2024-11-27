<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator;

use Exception;
use gianluApi\laravelDesign\ConfigGenerator\Contracts\ConfigGeneratorContract;
use gianluApi\laravelDesign\ConfigGenerator\Enums\GeneratorTypes;

class ConfigGeneratorRegistry
{

    /**
     * @var array<string, ConfigGeneratorContract>
     */
    protected array $types = [];

    public function register(GeneratorTypes $type, ConfigGeneratorContract $configGenerator): self
    {
        $this->types[$type->value] = $configGenerator;

        return $this;
    }

    /**
     * @throws Exception
     */
    public function get(GeneratorTypes $type): ConfigGeneratorContract
    {
        if ( in_array($this->types[$type->value], $this->types) ) {
            return $this->types[$type->value];
        }

        throw new Exception('Type not found');
    }

}
