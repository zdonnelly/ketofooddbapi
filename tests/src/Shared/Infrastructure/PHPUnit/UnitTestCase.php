<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Infrastructure\PHPUnit;

use KetoFoodDbApi\Shared\Domain\Bus\Event\EventBus;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery\MockInterface;

abstract class UnitTestCase extends MockeryTestCase
{
    protected function mock($className): MockInterface
    {
        return Mockery::mock($className);
    }

    protected function namedMock($name, $className): MockInterface
    {
        return Mockery::namedMock($name, $className);
    }

    /** @return EventBus|MockInterface */
    protected function eventBus(): MockInterface
    {
        return $this->eventBus = $this->eventBus ?: $this->mock(EventBus::class);
    }
}
