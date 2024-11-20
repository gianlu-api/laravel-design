<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Console;

class InterfaceMakeCommand extends MakeCommand
{

    protected $signature = 'make:interface {name} {namespace}';
    protected $description = 'Create new interface';
    protected $type = 'Interface';

    protected function getStub(): string
    {
        return __DIR__ . '/../../../stubs/Interface.stub';
    }

}
