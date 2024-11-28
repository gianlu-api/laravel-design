<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator\Contracts;

use gianluApi\laravelDesign\Helpers\PathHelper;
use Illuminate\Support\Arr;

abstract class AbstractConfigGenerator implements ConfigGeneratorInterface
{

    use PathHelper;

    /**
     * @param array<string, array<string, string>> $config
     *
     * @return array<int|string, array<string, string>|string>
     */
    public function generate(array $config): array
    {
        $newConfig = [];

        if (Arr::isAssoc($config)) {
            if ( Arr::exists($config, "names") && Arr::exists($config, "path") ) {
                $newConfig = static::generateItemFromNamesAndPathConfig($config);
            }
        } else {
            foreach ( $config as $configItem ) {
                if ( Arr::exists($configItem, "name") && Arr::exists($configItem, "path") ) {
                    $newConfig[] = static::generateItemFromNameAndPathConfig($configItem);
                }

                if ( Arr::exists($configItem, "name") && !Arr::exists($configItem, "path") ) {
                    $newConfig[] = static::generateItemFromOnlyNameConfig($configItem);
                }

                if ( Arr::exists($configItem, "names") && Arr::exists($configItem, "path") ) {
                    $newConfig = static::generateItemFromNamesAndPathConfig($configItem);
                }
            }
        }

        return $newConfig;
    }

    /**
     * @param array<string, string> $config
     *
     * @return array<string,string>
     */
    abstract protected static function generateItemFromNameAndPathConfig(array $config): array;

    /**
     * @param array<string, array<string, string>|string> $config
     *
     * @return array<string,string>
     */
    abstract protected static function generateItemFromOnlyNameConfig(array $config): array;

    /**
     * @param array<string, array<string, string>|string> $config
     *
     * @return array<string,string>
     */
    abstract protected static function generateItemFromNamesAndPathConfig(array $config): array;
}
