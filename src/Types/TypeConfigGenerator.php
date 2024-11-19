<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Types;

use gianluApi\laravelDesign\Types\Enums\Types;
use Illuminate\Support\Str;

final class TypeConfigGenerator
{

    /**
     * @param array<string, string> $config
     *
     * @return array<string, string|null>
     */
    public static function generate(array $config, Types $type): array
    {
        return match ( $type ) {
            Types::CustomClass => self::generateClassConfig($config),
            Types::Interface => self::generateInterfaceConfig($config),
            Types::AbstractClass => self::generateAbstractClassConfig($config),
            Types::Model => self::generateModelConfig($config),
            Types::Controller => self::generateControllerConfig($config),
            Types::Request => self::generateRequestConfig($config),
            Types::Resource => self::generateResourceConfig($config),
            Types::Middleware => self::generateMiddlewareConfig($config),
            Types::Blade => self::generateBladeConfig($config),
            Types::Vue => self::generateVueConfig($config),
            Types::Migration => self::generateMigrationConfig($config),
            Types::React => self::generateReactConfig($config),
        };
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string,string>
     */
    private static function generateClassConfig(array $config): array
    {
        $namespace = self::checkLeadingSlash($config[ "namespace" ]);

        return [
            "name" => $config[ "name" ],
            "namespace" => $namespace,
        ];
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string,string>
     */
    private static function generateInterfaceConfig(array $config): array
    {
        $namespace = self::checkLeadingSlash($config[ "namespace" ]);

        return [
            "name" => $config[ "name" ],
            "namespace" => $namespace,
        ];
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string,string>
     */
    private static function generateAbstractClassConfig(array $config): array
    {
        $namespace = self::checkLeadingSlash($config[ "namespace" ]);

        return [
            "name" => $config[ "name" ],
            "namespace" => $namespace,
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
            "name" => $config[ "name" ],
        ];
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string,string>
     */
    private static function generateControllerConfig(array $config): array
    {
        $newConfig = [ "name" => $config[ "name" ] ];

        if ( isset($config[ "is_resource" ]) ) {
            $newConfig[ "--resource" ] = $config[ "is_resource" ];
        }

        if ( isset($config[ "is_api" ]) ) {
            $newConfig[ "--api" ] = $config[ "is_api" ];
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
            "name" => $config[ "name" ],
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
            "name" => $config[ "name" ],
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
            "name" => $config[ "name" ],
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
            "name" => $config[ "name" ],
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
            "name" => $config[ "name" ],
            "namespace" => $config[ "namespace" ],
        ];

        if ( isset($config[ "component_type" ]) ) {
            $newConfig[ "--type" ] = $config[ "component_type" ];
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
            "name" => $config[ "name" ],
            "namespace" => $config[ "namespace" ],
        ];
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string, string>
     */
    private static function generateMigrationConfig(array $config): array
    {
        $table = Str::snake(Str::singular($config[ "name" ]));

        return [
            "name" => "create_{$table}_table",
            "--create" => $table,
        ];
    }

    private static function checkLeadingSlash(string $namespace): string
    {
        return Str::startsWith($namespace, "/") ? $namespace : "/{$namespace}";
    }

}
