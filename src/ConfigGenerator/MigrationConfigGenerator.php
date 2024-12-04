<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

final class MigrationConfigGenerator extends LaravelCommandConfigGenerator
{

    /**
     * @param array<string, array<string, string>>|array<string, string> $config
     *
     * @return array<array<string,string>>
     */
    public function generate(array $config): array
    {
        $newConfig = [];

        if ( Arr::exists($config, "table") && is_string($config['table'])) {

            $newConfig[] = self::generateItem($config['table']);

        } elseif ( Arr::exists($config, "tables") && is_array($config['tables']) ) {

            foreach ( $config['tables'] as $configItem ) {
                $newConfig[] = self::generateItem($configItem);
            }

        }

        return $newConfig;
    }

    /**
     * @param string $tableName
     *
     * @return array<string,string>
     */
    private static function generateItem(string $tableName): array
    {
        $table = Str::snake(Str::singular($tableName));

        return [
            "name" => "create_{$table}_table",
            "--create" => $table,
        ];
    }

}
