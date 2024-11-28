<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator;

use Illuminate\Support\Str;

final class ControllerConfigGenerator extends LaravelCommandConfigGenerator
{

    protected static function generateItemFromNameAndPathConfig(array $config): array
    {
        $configOptions = [];

        if ( isset($config["is_resource"]) ) {
            $configOptions["--resource"] = $config["is_resource"];
        }

        if ( isset($config["is_api"]) ) {
            $configOptions["--api"] = $config["is_api"];
        }

        return array_merge(["name" => self::checkPath($config["path"]) . $config["name"]], $configOptions);
    }

    protected static function generateItemFromOnlyNameConfig(array $config): array
    {
        $configOptions = [];

        if ( isset($config["is_resource"]) ) {
            $configOptions["--resource"] = $config["is_resource"];
        }

        if ( isset($config["is_api"]) ) {
            $configOptions["--api"] = $config["is_api"];
        }

        return array_merge(["name" => $config["name"]], $configOptions);
    }

}
