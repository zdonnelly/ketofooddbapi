<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Shared\Infrastructure\Api\Controller;

use KetoFoodDbApi\Shared\Domain\Bus\Command\Command;
use KetoFoodDbApi\Shared\Domain\Bus\Command\CommandBus;
use KetoFoodDbApi\Shared\Domain\Bus\Query\Query;
use KetoFoodDbApi\Shared\Domain\Bus\Query\QueryBus;
use KetoFoodDbApi\Shared\Domain\Bus\Query\Response;
use KetoFoodDbApi\Shared\Infrastructure\Api\Exception\ApiExceptionsHttpStatusCodeMapping;
use function Lambdish\Phunctional\each;

abstract class ApiController
{
    private $queryBus;
    private $commandBus;
    private $exceptionHandler;

    public function __construct(
        QueryBus $queryBus,
        CommandBus $commandBus,
        ApiExceptionsHttpStatusCodeMapping $exceptionHandler
    ) {
        $this->queryBus         = $queryBus;
        $this->commandBus       = $commandBus;
        $this->exceptionHandler = $exceptionHandler;

        each($this->exceptionRegistrar(), $this->exceptions());
    }

    abstract protected function exceptions(): array;

    protected function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }

    protected function ask(Query $query): ?Response
    {
        return $this->queryBus->ask($query);
    }

    private function exceptionRegistrar(): callable
    {
        return function ($httpCode, $exception): void {
            $this->exceptionHandler->register($exception, $httpCode);
        };
    }
}
