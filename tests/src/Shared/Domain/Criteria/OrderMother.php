<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Domain\Criteria;

use KetoFoodDbApi\Shared\Domain\Criteria\Order;
use KetoFoodDbApi\Shared\Domain\Criteria\OrderBy;
use KetoFoodDbApi\Shared\Domain\Criteria\OrderType;

final class OrderMother
{
    public static function create(OrderBy $orderBy, OrderType $orderType): Order
    {
        return new Order($orderBy, $orderType);
    }

    public static function createDesc($orderBy): Order
    {
        return Order::createDesc($orderBy);
    }

    public static function random(): Order
    {
        return self::create(OrderByMother::random(), OrderType::random());
    }
}
