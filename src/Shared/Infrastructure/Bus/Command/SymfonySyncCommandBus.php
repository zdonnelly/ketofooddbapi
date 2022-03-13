<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Shared\Infrastructure\Bus\Command;

use KetoFoodDbApi\Shared\Domain\Bus\Command\Command;
use KetoFoodDbApi\Shared\Domain\Bus\Command\CommandBus;
use KetoFoodDbApi\Shared\Infrastructure\Symfony\Bundle\DependencyInjection\Compiler\CallableFirstParameterExtractor;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;

class SymfonySyncCommandBus implements CommandBus
{
    private $bus;

    public function __construct(iterable $commandHandlers)
    {
        $this->bus = new MessageBus(
            [
                new HandleMessageMiddleware(
                    new HandlersLocator(CallableFirstParameterExtractor::forCallables($commandHandlers))
                ),
            ]
        );
    }

    public function dispatch(Command $command): void
    {
        try {
            $this->bus->dispatch($command);
        } catch (NoHandlerForMessageException $unused) {
            throw new CommandNotRegisteredError($command);
        }
    }
}
