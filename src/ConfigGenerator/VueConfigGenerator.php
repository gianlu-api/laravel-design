<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator;

use Illuminate\Support\Str;

final class VueConfigGenerator extends CustomCommandConfigGenerator
{

    /**
     * @param array<string, string> $config
     *
     * @return array<string, string|bool>
     */
    protected static function generateItemFromNameAndPathConfig(array $config): array
    {
        $configOptions = self::addOption($config);

        return array_merge([
            "name" => $config["name"],
            "path" => self::checkPath($config["path"]),
        ], $configOptions);
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string, string|bool>
     */
    protected static function generateItemFromOnlyNameConfig(array $config): array
    {
        $configOptions = self::addOption($config);

        return array_merge([
            "name" => Str::afterLast($config["name"], "/"),
            "path" => self::checkPath(Str::beforeLast($config["name"], "/"))
        ], $configOptions);
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string, string>|array{}
     */
    private static function addOption(array $config): array
    {
        $configOptions = [];

        if ( isset($config["type"]) ) {
            $configOptions["--type"] = $config["type"];
        }

        return $configOptions;
    }

}
