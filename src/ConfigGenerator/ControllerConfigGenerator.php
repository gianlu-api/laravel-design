<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator;

final class ControllerConfigGenerator extends LaravelCommandConfigGenerator
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

        return array_merge(["name" => self::checkPath($config["path"]) . $className], $configOptions);
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

        return array_merge(["name" => $className], $configOptions);
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
