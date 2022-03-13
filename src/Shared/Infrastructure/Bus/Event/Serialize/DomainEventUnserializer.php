<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Shared\Infrastructure\Bus\Event\Serialize;

use KetoFoodDbApi\Shared\Domain\Bus\Event\DomainEvent;
use KetoFoodDbApi\Shared\Infrastructure\Bus\Event\DomainEventMapping;
use function KetoFoodDbApi\Utils\Shared\snake_to_camel;
use function Lambdish\Phunctional\get;
use function Lambdish\Phunctional\reindex;

final class DomainEventUnserializer
{
    private $eventMapping;

    public function __construct(DomainEventMapping $eventMapping)
    {
        $this->eventMapping = $eventMapping;
    }

    public function __invoke(string $serializedEvent): DomainEvent
    {
        $parsedEvent = json_decode($serializedEvent, true);

        $eventName  = $parsedEvent['type'];
        $eventClass = $this->eventMapping->for($eventName);

        return new $eventClass(get('id', $parsedEvent), reindex($this->toCamel(), $parsedEvent));
    }

    private function toCamel(): callable
    {
        return function ($unused, $key): string {
            return snake_to_camel($key);
        };
    }
}
