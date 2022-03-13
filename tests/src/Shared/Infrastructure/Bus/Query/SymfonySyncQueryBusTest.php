<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Infrastructure\Bus\Query;

use KetoFoodDbApi\Shared\Domain\Bus\Query\Query;
use KetoFoodDbApi\Shared\Infrastructure\Bus\Query\QueryNotRegisteredError;
use KetoFoodDbApi\Shared\Infrastructure\Bus\Query\SymfonySyncQueryBus;
use KetoFoodDbApi\Tests\Shared\Infrastructure\PHPUnit\UnitTestCase;
use RuntimeException;

final class SymfonySyncQueryBusTest extends UnitTestCase
{
    /** @var SymfonySyncQueryBus */
    private $queryBus;

    protected function setUp()
    {
        parent::setUp();

        $this->queryBus = new SymfonySyncQueryBus([$this->queryHandler()]);
    }

    /**
     * @test
     * @expectedException RuntimeException
     */
    public function it_should_return_a_response_successfully(): void
    {
        $this->queryBus->ask(new FakeQuery());
    }

    /** @test */
    public function it_should_raise_an_exception_dispatching_a_non_registered_query(): void
    {
        $this->expectException(QueryNotRegisteredError::class);

        $this->queryBus->ask($this->mock(Query::class));
    }

    private function queryHandler()
    {
        return new class
        {
            public function __invoke(FakeQuery $query)
            {
                throw new RuntimeException('This works fine!');
            }
        };
    }
}
