<?php

declare(strict_types=1);

namespace gianluApi\laravelDesign\ConfigGenerator;

use gianluApi\laravelDesign\ConfigGenerator\Contracts\AbstractConfigGenerator;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Self_;

class CustomCommandConfigGenerator extends AbstractConfigGenerator
{
    /**
     * @param array<string, string> $config
     * @param string|null $name
     *
     * @return array<string, string>
     */
    protected static function generateItemFromNameAndPathConfig(array $config, ?string $name = null): array
    {
        $className = $config["name"];
        $path = $config['path'];

        if ($name) {
            $className = self::substituteVariables($className, $name);
            $path = self::substituteVariables($config['path'], $name);
        }

        $config = [
            "name" => $className,
            "path" => self::checkPath($path),
        ];

        return static::addOptionsToConfig($config);
    }

    /**
     * @param array<string, string> $config
     * @param string|null $name
     *
     * @return array<string, string>
     */
    protected static function generateItemFromOnlyNameConfig(array $config, ?string $name = null): array
    {
        $className = $config["name"];

        if ($name) {
            $className = self::substituteVariables($className, $name);
        }

        $config = [
            "name" => Str::afterLast($className, "/"),
            "path" => self::checkPath(Str::beforeLast($className, "/"))
        ];

        return static::addOptionsToConfig($config);
    }

    /**
     * @param array<string, array<string, string>|string> $config
     * @param string|null $name
     *
     * @return list<array<string, string>>
     */
    protected static function generateItemFromNamesAndPathConfig(array $config, ?string $name = null): array
    {
        $newConfig = [];

        if (!is_array($config["names"])) {
            return $newConfig;
        }

        foreach ($config["names"] as $className) {
            if (!is_string($config["path"])) {
                continue;
            }

            $path = $config["path"];

            if ($name) {
                $className = self::substituteVariables($className, $name);
                $path = self::substituteVariables($config["path"], $name);
            }

            $newConfig[] = static::generateItemFromNameAndPathConfig(["name" => $className, "path" => $path]);
        }

        return self::addOptionsToConfig($newConfig);
    }

}
