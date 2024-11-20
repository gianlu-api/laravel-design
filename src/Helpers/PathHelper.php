<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Helpers;

use Illuminate\Support\Str;

trait PathHelper
{

    public static function checkPath(string $path): string
    {
        $path = self::checkLeadingSlash($path);

        return self::checkTrailingSlash($path);
    }

    public static function checkLeadingSlash(string $path): string
    {
        return Str::startsWith($path, "/") ? $path : "/$path";
    }

    public static function checkTrailingSlash(string $path): string
    {
        return rtrim($path, '/');
    }

}
