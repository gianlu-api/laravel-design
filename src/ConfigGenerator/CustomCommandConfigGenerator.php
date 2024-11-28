<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator;

use gianluApi\laravelDesign\ConfigGenerator\Contracts\AbstractConfigGenerator;
use Illuminate\Support\Str;

class CustomCommandConfigGenerator extends AbstractConfigGenerator
{

    /**
     * @param array<string, string> $config
     *
     * @return array<string, string>
     */
    protected static function generateItemFromNameAndPathConfig(array $config): array
    {
        return [
            "name" => $config["name"],
            "path" => self::checkPath($config["path"]),
        ];
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string, string>
     */
    protected static function generateItemFromOnlyNameConfig(array $config): array
    {
        return [
            "name" => Str::afterLast($config["name"], "/"),
            "path" => self::checkPath(Str::beforeLast($config["name"], "/"))
        ];
    }

    /**
     * @param array<string, array<string, string>|string> $config
     *
     * @return list<array<string, string>>
     */
    protected static function generateItemFromNamesAndPathConfig(array $config): array
    {
        $newConfig = [];

        if ( !is_array($config["names"]) ) {
            return $newConfig;
        }

        foreach ( $config["names"] as $name ) {
            if ( !is_string($config["path"]) ) {
                continue;
            }

            $newConfig[] = static::generateItemFromNameAndPathConfig(["name" => $name, "path" => $config["path"]]);
        }

        return $newConfig;
    }

}
