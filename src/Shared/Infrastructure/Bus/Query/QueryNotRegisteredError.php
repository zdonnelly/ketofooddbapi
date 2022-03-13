<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Shared\Infrastructure\Bus\Query;

use KetoFoodDbApi\Shared\Domain\Bus\Query\Query;
use KetoFoodDbApi\Shared\Domain\DomainError;

final class QueryNotRegisteredError extends DomainError
{
    private $query;

    public function __construct(Query $query)
    {
        $this->query = $query;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'query_bus_not_registered_error';
    }

    protected function errorMessage(): string
    {
        return sprintf('The query <%s> has not been registered', get_class($this->query));
    }
}
