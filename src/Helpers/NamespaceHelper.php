<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Helpers;

use Illuminate\Support\Str;

trait NamespaceHelper
{

    public static function checkNamespace(string $namespace): string
    {
        $namespace = self::checkLeadingSlash($namespace);

        return self::checkTrailingSlash($namespace);
    }

    public static function checkLeadingSlash(string $namespace): string
    {
        return Str::startsWith($namespace, "/") ? $namespace : "/$namespace";
    }

    public static function checkTrailingSlash(string $namespace): string
    {
        return rtrim($namespace, '/');
    }

}
