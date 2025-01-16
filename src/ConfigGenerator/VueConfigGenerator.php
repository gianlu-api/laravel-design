<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator;

use Illuminate\Support\Str;

final class VueConfigGenerator extends CustomCommandConfigGenerator
{

    /**
     * @param array<string, string> $config
     * @param string|null $name
     *
     * @return array<string, string|bool>
     */
    protected static function generateItemFromNameAndPathConfig(array $config, ?string $name = null): array
    {
        $configOptions = self::addOption($config);
        $className = $config["name"];

        if ($name) {
            $className = self::substituteVariables($className, $name);
        }

        return array_merge([
            "name" => $className,
            "path" => self::checkPath($config["path"]),
        ], $configOptions);
    }

    /**
     * @param array<string, string> $config
     * @param string|null $name
     *
     * @return array<string, string|bool>
     */
    protected static function generateItemFromOnlyNameConfig(array $config, ?string $name = null): array
    {
        $configOptions = self::addOption($config);
        $className = $config["name"];

        if ($name) {
            $className = self::substituteVariables($className, $name);
        }

        return array_merge([
            "name" => Str::afterLast($className, "/"),
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
