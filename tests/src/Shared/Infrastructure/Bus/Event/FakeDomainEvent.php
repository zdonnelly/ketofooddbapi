<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Infrastructure\Bus\Event;

use KetoFoodDbApi\Shared\Domain\Bus\Event\DomainEvent;

final class FakeDomainEvent extends DomainEvent
{
    public static function eventName(): string
    {
        return 'fake_event';
    }

    protected function rules(): array
    {
        return [];
    }
}
