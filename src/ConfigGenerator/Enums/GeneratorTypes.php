<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\ConfigGenerator\Enums;

enum GeneratorTypes: string
{

    case CustomClass = 'class';
    case Interface = 'interface';
    case AbstractClass = 'abstract_class';
    case Model = 'model';
    case Controller = 'controller';
    case Request = 'request';
    case Resource = 'resource';
    case Migration = 'migration';
    case Middleware = 'middleware';
    case Blade = 'blade';
    case Vue = 'vue';
    case React = 'react';

}
