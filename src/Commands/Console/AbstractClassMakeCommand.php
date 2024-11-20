<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Console;

use gianluApi\laravelDesign\Helpers\NamespaceHelper;

class AbstractClassMakeCommand extends MakeCommand
{

    use NamespaceHelper;

    protected $signature = 'make:class:abstract {name} {namespace}';
    protected $description = 'Create new abstract class';
    protected $type = 'Abstract Class';

    protected function getStub(): string
    {
        return __DIR__ . '/../../../stubs/AbstractClass.stub';
    }

}
