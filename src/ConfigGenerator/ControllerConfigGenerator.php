<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator;

final class ControllerConfigGenerator extends LaravelCommandConfigGenerator
{

    /**
     * @param array<array<string, string>> $config
     *
     * @return array<array<string,string>>
     */
    public static function generate(array $config): array
    {
        $newConfig = [];

        foreach ( $config as $configItem ) {
            $newConfig[] = ["name" => $configItem["name"]];

            if ( isset($config["is_resource"]) ) {
                $newConfig[]["--resource"] = $configItem["is_resource"];
            }

            if ( isset($config["is_api"]) ) {
                $newConfig[]["--api"] = $configItem["is_api"];
            }

        }

        return $newConfig;
    }

}
