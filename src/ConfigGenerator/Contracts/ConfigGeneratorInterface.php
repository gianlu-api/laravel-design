<?php declare(strict_types=1);

namespace gianluApi\laravelDesign\ConfigGenerator\Contracts;

interface ConfigGeneratorInterface
{

    /**
     * @param array<string, mixed> $config
     *
     * @return array<array<string,string>>
     */
    public function generate(array $config): array;

}
