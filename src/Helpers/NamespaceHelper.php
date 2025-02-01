<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Helpers;

use Illuminate\Support\Str;

trait NamespaceHelper
{

    public static function checkNamespace(string $namespace): string
    {
        if ( Str::contains($namespace, "\..") ) {
            $namespace = 'App' . Str::afterLast($namespace, "\..");
        }

        return trim(implode('\\', array_slice(explode('\\', $namespace), 0, -1)), '\\');
    }

    public static function checkClassName(string $className): string
    {
        if ( Str::contains($className, "\..") ) {
            return Str::afterLast($className, '\\');
        }

        return $className;
    }

    public static function checkNamespaceForClassBuild(string $namespace): string
    {
        if ( Str::contains($namespace, "\..") ) {
            return 'App' . Str::afterLast($namespace, "\..");
        }

        return $namespace;
    }

}
