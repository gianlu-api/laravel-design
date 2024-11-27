<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator;

use gianluApi\laravelDesign\ConfigGenerator\Contracts\ConfigGeneratorContract;

class LaravelCommandConfigGenerator extends ConfigGeneratorContract
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
            ];
        }

        return $newConfig;
    }

}
