<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Console;

class AbstractClassMakeCommand extends MakeCommand
{

    protected $signature = 'make:class:abstract {name} {path}';
    protected $description = 'Create new abstract class';
    protected $type = 'Abstract Class';

    protected function getStub(): string
    {
        return __DIR__ . '/../../../stubs/AbstractClass.stub';
    }

}
