<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Infrastructure\Bus\Event;

use KetoFoodDbApi\Shared\Domain\Bus\Event\DomainEvent;

/**
 * @method string someIdentifier()
 */
final class ConstructionTestDomainEvent extends DomainEvent
{
    public static function eventName(): string
    {
        return 'construction_test';
    }

    protected function rules(): array
    {
        return [
            'someIdentifier' => ['string'],
        ];
    }
}
