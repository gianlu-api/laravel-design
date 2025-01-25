<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator\Contracts;

interface ConfigGeneratorInterface
{

    /**
     * @param array<string, mixed> $config
     * @param string|null $name
     *
     * @return array<array<string,string>>
     */
    public function generate(array $config, ?string $name = null): array;

}
