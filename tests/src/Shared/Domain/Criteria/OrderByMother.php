<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Domain\Criteria;

use KetoFoodDbApi\Shared\Domain\Criteria\OrderBy;
use KetoFoodDbApi\Tests\Shared\Domain\WordMother;

final class OrderByMother
{
    public static function create($fieldName): OrderBy
    {
        return new OrderBy($fieldName);
    }

    public static function random(): OrderBy
    {
        return self::create(WordMother::random());
    }
}
