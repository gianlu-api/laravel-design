<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Callers;

use gianluApi\laravelDesign\Commands\Selectors\CommandSelector;
use gianluApi\laravelDesign\Types\Enums\Types;
use Illuminate\Support\Facades\Artisan;

final class CommandCaller
{

    /**
     *
     * @param array<string, mixed> $config
     * @param Types $type
     */
    public static function call(array $config, Types $type): void
    {
        Artisan::call(CommandSelector::handle($type), $config);
    }

}
