<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

final class MigrationConfigGenerator extends LaravelCommandConfigGenerator
{

    /**
     * @param array<string, array<string, string>>|array<string, string> $config
     * @param string|null $name
     *
     * @return array<array<string,string>>
     */
    public function generate(array $config, ?string $name = null): array
    {
        $newConfig = [];

        if ( Arr::exists($config, "table") && is_string($config['table'])) {

            $newConfig[] = self::generateItem($config['table'], $name);

        } elseif ( Arr::exists($config, "tables") && is_array($config['tables']) ) {

            foreach ( $config['tables'] as $configItem ) {
                $newConfig[] = self::generateItem($configItem, $name);
            }

        }

        return $newConfig;
    }

    /**
     * @param string $tableName
     * @param string|null $name
     *
     * @return array<string,string>
     */
    private static function generateItem(string $tableName, ?string $name = null): array
    {
        $table = Str::snake(Str::singular($tableName));

        if ($name) {
            $table = Str::snake(Str::singular(self::substituteVariables($tableName, $name)));
        }

        return [
            "name" => "create_{$table}_table",
            "--create" => $table,
        ];
    }

}
