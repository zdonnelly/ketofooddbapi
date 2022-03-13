<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Shared\Domain\Bus\Event;

interface EventBus
{
    public function notify(DomainEvent $event): void;
}
