<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Infrastructure\Behat;

use Behat\Behat\Context\Context;
use KetoFoodDbApi\Shared\Domain\Bus\Event\DomainEvent;
use KetoFoodDbApi\Shared\Infrastructure\Bus\Event\SymfonySyncDomainEventPublisher;
use KetoFoodDbApi\Shared\Infrastructure\Bus\Event\SymfonySyncEventBus;
use KetoFoodDbApi\Shared\Infrastructure\Doctrine\DatabaseConnections;
use function Lambdish\Phunctional\each;

final class ApiFeatureContext implements Context
{
    private $connections;
    private $publisher;
    private $bus;

    public function __construct(
        DatabaseConnections $connections,
        SymfonySyncDomainEventPublisher $publisher,
        SymfonySyncEventBus $bus
    ) {
        $this->connections = $connections;
        $this->publisher   = $publisher;
        $this->bus         = $bus;
    }

    /** @BeforeScenario */
    public function cleanEnvironment(): void
    {
        $this->connections->clear();
        $this->connections->truncate();
    }

    /** @AfterStep */
    public function publishEvents(): void
    {
        $publisher = function (DomainEvent $event) {
            $this->bus->notify($event);
        };

        while ($this->publisher->hasEventsToPublish()) {
            each($publisher, $this->publisher->popPublishedEvents());
        }
    }
}
