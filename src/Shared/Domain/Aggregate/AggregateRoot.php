<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Shared\Domain\Aggregate;

use KetoFoodDbApi\Shared\Domain\Bus\Event\DomainEvent;

abstract class AggregateRoot
{
    private $domainEvents = [];

    final public function pullDomainEvents(): array
    {
        $domainEvents       = $this->domainEvents;
        $this->domainEvents = [];

        return $domainEvents;
    }

    final protected function record(DomainEvent $domainEvent): void
    {
        $this->domainEvents[] = $domainEvent;
    }
}
