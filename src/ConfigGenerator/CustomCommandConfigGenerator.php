<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator;

use gianluApi\laravelDesign\ConfigGenerator\Contracts\ConfigGeneratorContract;

class CustomCommandConfigGenerator extends ConfigGeneratorContract
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
            $path = self::checkPath($configItem["path"]);

            $newConfig[] = [
                "name" => $configItem["name"],
                "path" => $path,
            ];
        }

        return $newConfig;
    }

}
