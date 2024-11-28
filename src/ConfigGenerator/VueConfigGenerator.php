<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator;

use Illuminate\Support\Str;

final class VueConfigGenerator extends CustomCommandConfigGenerator
{

    /**
     * @param array<string, string> $config
     *
     * @return array<string, string>
     */
    protected static function generateItemFromNameAndPathConfig(array $config): array
    {
        $configOptions = [];

        if ( isset($config["component_type"]) ) {
            $configOptions["--type"] = $config["component_type"];
        }

        return array_merge([
            "name" => $config["name"],
            "path" => self::checkPath($config["path"]),
        ], $configOptions);
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string, string>
     */
    protected static function generateItemFromOnlyNameConfig(array $config): array
    {
        $configOptions = [];

        if ( isset($config["component_type"]) ) {
            $configOptions["--type"] = $config["component_type"];
        }

        return array_merge([
            "name" => Str::afterLast($config["name"], "/"),
            "path" => self::checkPath(Str::beforeLast($config["name"], "/"))
        ], $configOptions);
    }

}
