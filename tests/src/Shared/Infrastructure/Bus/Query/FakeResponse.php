<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Infrastructure\Bus\Query;

use KetoFoodDbApi\Shared\Domain\Bus\Query\Response;

final class FakeResponse implements Response
{
    private $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function number(): int
    {
        return $this->number;
    }
}
