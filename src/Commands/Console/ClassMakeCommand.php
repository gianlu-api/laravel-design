<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Console;

class ClassMakeCommand extends MakeCommand
{

    protected $signature = 'make:class {name} {path}';
    protected $description = 'Create new class';
    protected $type = 'Class';

    protected function getStub(): string
    {
        return __DIR__ . '/../../../stubs/Class.stub';
    }

}
