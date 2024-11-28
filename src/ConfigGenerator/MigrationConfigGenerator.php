<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator;

use Illuminate\Support\Str;

final class MigrationConfigGenerator extends LaravelCommandConfigGenerator
{

    /**
     * @param array<array<string, string>> $config
     *
     * @return array<array<string,string>>
     */
    public function generate(array $config): array
    {
        $newConfig = [];

        foreach ( $config as $configItem ) {
            $table = Str::snake(Str::singular($configItem["name"]));

            $newConfig[] = [
                "name" => "create_{$table}_table",
                "--create" => $table,
            ];
        }

        return $newConfig;
    }

}
