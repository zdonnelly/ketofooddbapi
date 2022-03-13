<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Shared\Infrastructure\Bus\Event;

use KetoFoodDbApi\Shared\Domain\Bus\Event\DomainEvent;
use KetoFoodDbApi\Shared\Domain\Bus\Event\EventBus;
use KetoFoodDbApi\Shared\Infrastructure\Symfony\Bundle\DependencyInjection\Compiler\CallableFirstParameterExtractor;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;

class SymfonySyncEventBus implements EventBus
{
    private $bus;

    public function __construct(iterable $subscribers)
    {
        $this->bus = new MessageBus(
            [
                new HandleMessageMiddleware(
                    new HandlersLocator(
                        CallableFirstParameterExtractor::forPipedCallables($subscribers)
                    )
                ),
            ]
        );
    }

    public function notify(DomainEvent $event): void
    {
        $this->bus->dispatch($event);
    }
}
