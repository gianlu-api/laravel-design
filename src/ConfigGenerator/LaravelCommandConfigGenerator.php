<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator;

use gianluApi\laravelDesign\ConfigGenerator\Contracts\AbstractConfigGenerator;

class LaravelCommandConfigGenerator extends AbstractConfigGenerator
{

    /**
     * @param array<string, string> $config
     *
     * @return array<string, string>
     */
    protected static function generateItemFromNameAndPathConfig(array $config): array
    {
        return [
            "name" => self::checkPath($config["path"]) . $config["name"],
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
            "name" => $config["name"],
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

            $newConfig[] = ["name" => self::checkPath($config["path"]) . $name];
        }

        return $newConfig;
    }

}
