<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Domain\Criteria;

use KetoFoodDbApi\Shared\Domain\Criteria\Criteria;
use KetoFoodDbApi\Shared\Domain\Criteria\Filters;
use KetoFoodDbApi\Shared\Domain\Criteria\Order;
use KetoFoodDbApi\Tests\Shared\Domain\NumberMother;

final class CriteriaMother
{
    public static function create(Filters $filters, ?Order $order, ?int $offset, ?int $limit): Criteria
    {
        return new Criteria($filters, $order, $offset, $limit);
    }

    public static function noFilters(): Criteria
    {
        return self::create(FiltersMother::blank(), null, null, null);
    }

    public static function random(): Criteria
    {
        return self::create(
            FiltersMother::random(),
            OrderMother::random(),
            NumberMother::random(),
            NumberMother::random()
        );
    }
}
