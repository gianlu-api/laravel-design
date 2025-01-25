<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Helpers;

use Illuminate\Support\Str;

trait PathHelper
{

    public static function checkPath(string $path, bool $trailingSlash = true, ?string $name = null): string
    {
        if ($name) {
            $path = self::substituteVariables($path, $name);
        }

        $path = self::addLeadingSlash($path);

        if ($trailingSlash) {
            return self::addTrailingSlash($path);
        }

        return self::removeTrailingSlash($path);
    }

    public static function addLeadingSlash(string $path): string
    {
        return Str::startsWith($path,'app') ? $path : Str::start($path, "/");
    }

    public static function removeLeadingSlash(string $path): string
    {
        return ltrim($path, "/");
    }

    public static function removeTrailingSlash(string $path): string
    {
        return rtrim($path, '/');
    }

    public static function addTrailingSlash(string $path): string
    {
        return Str::finish($path, '/');
    }

    public static function substituteVariables(string $string, string $value): string
    {
        return str_replace('&', $value, $string);
    }

}
