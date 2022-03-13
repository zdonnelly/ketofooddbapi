<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Infrastructure\Bus\Event;

use KetoFoodDbApi\Shared\Domain\Bus\Event\DomainEvent;
use KetoFoodDbApi\Shared\Domain\Bus\Event\DomainEventSubscriber;
use KetoFoodDbApi\Shared\Infrastructure\Bus\Event\SymfonySyncEventBus;
use KetoFoodDbApi\Tests\Shared\Infrastructure\PHPUnit\UnitTestCase;

final class SymfonySyncEventBusTest extends UnitTestCase
{
    public static $totalTimesCalled;
    /** @var SymfonySyncEventBus */
    private $bus;

    protected function setUp()
    {
        parent::setUp();

        self::$totalTimesCalled = 0;

        $this->bus = new SymfonySyncEventBus(
            [
                $this->subscriber(),
                $this->subscriber(),
            ]
        );
    }

    /** @test */
    public function it_should_publish_and_handle_one_event(): void
    {
        $this->bus->notify(new FakeDomainEvent('aggregate id'));

        $this->assertEquals(2, self::$totalTimesCalled);
    }

    private function subscriber()
    {
        return new class() implements DomainEventSubscriber
        {
            public function __invoke(DomainEvent $unused)
            {
                SymfonySyncEventBusTest::$totalTimesCalled++;
            }

            public static function subscribedTo(): array
            {
                return [FakeDomainEvent::class];
            }
        };
    }
}
