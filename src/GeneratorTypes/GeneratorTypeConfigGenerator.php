<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\GeneratorTypes;

use gianluApi\laravelDesign\Helpers\PathHelper;
use gianluApi\laravelDesign\GeneratorTypes\Enums\GeneratorTypes;
use Illuminate\Support\Str;

final class GeneratorTypeConfigGenerator
{

    use PathHelper;

    /**
     * @param array<string, string> $config
     *
     * @return array<string, string|null>
     */
    public static function generate(array $config, GeneratorTypes $type): array
    {
        return match ( $type ) {
            GeneratorTypes::CustomClass => self::generateClassConfig($config),
            GeneratorTypes::Interface => self::generateInterfaceConfig($config),
            GeneratorTypes::AbstractClass => self::generateAbstractClassConfig($config),
            GeneratorTypes::Model => self::generateModelConfig($config),
            GeneratorTypes::Controller => self::generateControllerConfig($config),
            GeneratorTypes::Request => self::generateRequestConfig($config),
            GeneratorTypes::Resource => self::generateResourceConfig($config),
            GeneratorTypes::Middleware => self::generateMiddlewareConfig($config),
            GeneratorTypes::Blade => self::generateBladeConfig($config),
            GeneratorTypes::Vue => self::generateVueConfig($config),
            GeneratorTypes::Migration => self::generateMigrationConfig($config),
            GeneratorTypes::React => self::generateReactConfig($config),
        };
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string,string>
     */
    private static function generateClassConfig(array $config): array
    {
        $path = self::checkPath($config["path"]);

        return [
            "name" => $config["name"],
            "path" => $path,
        ];
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string,string>
     */
    private static function generateInterfaceConfig(array $config): array
    {
        $path = self::checkPath($config["path"]);

        return [
            "name" => $config["name"],
            "path" => $path,
        ];
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string,string>
     */
    private static function generateAbstractClassConfig(array $config): array
    {

        $path = self::checkPath($config["path"]);

        return [
            "name" => $config["name"],
            "path" => $path,
        ];
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string,string>
     */
    private static function generateModelConfig(array $config): array
    {
        return [
            "name" => $config["name"],
        ];
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string,string>
     */
    private static function generateControllerConfig(array $config): array
    {
        $newConfig = ["name" => $config["name"]];

        if ( isset($config["is_resource"]) ) {
            $newConfig["--resource"] = $config["is_resource"];
        }

        if ( isset($config["is_api"]) ) {
            $newConfig["--api"] = $config["is_api"];
        }

        return $newConfig;
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string,string>
     */
    private static function generateRequestConfig(array $config): array
    {
        return [
            "name" => $config["name"],
        ];
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string,string>
     */
    private static function generateResourceConfig(array $config): array
    {
        return [
            "name" => $config["name"],
        ];
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string,string>
     */
    private static function generateMiddlewareConfig(array $config): array
    {
        return [
            "name" => $config["name"],
        ];
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string,string>
     */
    private static function generateBladeConfig(array $config): array
    {
        return [
            "name" => $config["name"],
        ];
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string,string>
     */
    private static function generateVueConfig(array $config): array
    {
        $newConfig = [
            "name" => $config["name"],
            "path" => $config["path"],
        ];

        if ( isset($config["component_type"]) ) {
            $newConfig["--type"] = $config["component_type"];
        }

        return $newConfig;
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string,string>
     */
    private static function generateReactConfig(array $config): array
    {
        return [
            "name" => $config["name"],
            "path" => $config["path"],
        ];
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string, string>
     */
    private static function generateMigrationConfig(array $config): array
    {
        $table = Str::snake(Str::singular($config["name"]));

        return [
            "name" => "create_{$table}_table",
            "--create" => $table,
        ];
    }

}
