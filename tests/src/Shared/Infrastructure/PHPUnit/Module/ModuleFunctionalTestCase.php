<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Infrastructure\PHPUnit\Module;

use KetoFoodDbApi\Shared\Domain\Bus\Event\DomainEvent;
use KetoFoodDbApi\Shared\Domain\Bus\Event\DomainEventPublisher;
use KetoFoodDbApi\Tests\Shared\Infrastructure\Arranger\EnvironmentArranger;
use KetoFoodDbApi\Tests\Shared\Infrastructure\PHPUnit\FunctionalTestCase;
use function KetoFoodDbApi\Tests\Shared\assertSimilar;
use Doctrine\ORM\EntityManager;
use function Lambdish\Phunctional\each;

abstract class ModuleFunctionalTestCase extends FunctionalTestCase
{
    abstract protected function environmentArrangers();

    protected function setUp()
    {
        parent::setUp();

        each(
            function (EnvironmentArranger $arranger) {
                $arranger->arrange();
            },
            $this->environmentArrangers()
        );
    }

    protected function tearDown()
    {
        each(
            function (EnvironmentArranger $arranger) {
                $arranger->close();
            },
            $this->environmentArrangers()
        );

        parent::tearDown();
    }

    protected function clearUnitOfWork(): void
    {
        $this->service(EntityManager::class)->clear();
    }

    protected function notify(DomainEvent $event): void
    {
        $this->assertNull($this->domainEventPublisher()->publish($event));
    }

    protected function assertSimilar($expected, $actual): void
    {
        assertSimilar($expected, $actual);
    }

    private function domainEventPublisher(): DomainEventPublisher
    {
        return $this->service('codely.infrastructure.domain_event_publisher');
    }
}
