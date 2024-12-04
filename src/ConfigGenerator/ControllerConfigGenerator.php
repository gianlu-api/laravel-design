<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator;

final class ControllerConfigGenerator extends LaravelCommandConfigGenerator
{

    /**
     * @param array<string, string> $config
     *
     * @return array<string, string|bool>
     */
    protected static function generateItemFromNameAndPathConfig(array $config): array
    {
        $configOptions = self::addOption($config);

        return array_merge(["name" => self::checkPath($config["path"]) . $config["name"]], $configOptions);
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string, string|bool>
     */
    protected static function generateItemFromOnlyNameConfig(array $config): array
    {
        $configOptions = self::addOption($config);

        return array_merge(["name" => $config["name"]], $configOptions);
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string, bool>|array{}
     */
    private static function addOption(array $config): array
    {
        $configOptions = [];

        if ( isset($config["type"]) ) {
            $configOptions["--" . $config["type"]] = true;
        }

        return $configOptions;
    }

}
