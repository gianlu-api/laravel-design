<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator;

final class VueConfigGenerator extends CustomCommandConfigGenerator
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
            $newConfig[] = [
                "name" => $configItem["name"],
                "path" => $configItem["path"],
            ];

            if ( isset($config["component_type"]) ) {
                $newConfig["--type"] = $configItem["component_type"];
            }
        }

        return $newConfig;
    }

}
