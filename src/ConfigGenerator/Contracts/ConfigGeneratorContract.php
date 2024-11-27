<?php declare(strict_types=1);

namespace gianluApi\laravelDesign\ConfigGenerator\Contracts;

use gianluApi\laravelDesign\Helpers\PathHelper;

abstract class ConfigGeneratorContract
{

    use PathHelper;

    /**
     * @param array<array<string, string>> $config
     *
     * @return array<array<string,string>>
     */
    abstract public static function generate(array $config): array;

}
