<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Console;

use gianluApi\laravelDesign\ConfigGenerator\Handlers\GeneratorItemHandler;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;
use Throwable;

class DesignMakeCommand extends Command
{

    protected $signature = "make:design {?name} {--config}";
    protected $description = "Create a new design structure";

    public function handle(GeneratorItemHandler $typeHandler): int
    {
        try {
            $configOption = $this->option("config");

            if ( is_string($configOption) || is_array($configOption) ) {
                $config = config($configOption);
            } else {
                $config = config("laravel-design");
            }

            /** @var array<string, array<string, mixed>> $config */
            $typeHandler->process($config);

            $this->output->success("Design created successfully");

            return CommandAlias::SUCCESS;
        } catch (Throwable $th) {
            $this->output->error($th->getMessage());

            return CommandAlias::FAILURE;
        }
    }

}
