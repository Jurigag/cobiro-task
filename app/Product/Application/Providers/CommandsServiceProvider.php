<?php
declare(strict_types=1);

namespace App\Product\Application\Providers;

use App\Product\Application\Command\CreateProductCommand;
use App\Product\Application\Command\CreateProductCommandHandler;
use Carbon\Laravel\ServiceProvider;
use Joselfonseca\LaravelTactician\CommandBusInterface;

/**
 * Class CommandsServiceProvider
 * @package App\Product\Application\Providers
 */
class CommandsServiceProvider extends ServiceProvider
{
    protected $commandsMap = [
        CreateProductCommand::class => CreateProductCommandHandler::class,
    ];

    public function boot(): void
    {
        $bus = $this->app->make(CommandBusInterface::class);
        foreach($this->commandsMap as $command => $handler)
        {
            $bus->addHandler($command, $handler);
        }
        $this->app->instance(CommandBusInterface::class, $bus);
    }
}
