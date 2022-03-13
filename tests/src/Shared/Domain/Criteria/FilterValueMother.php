<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Domain\Criteria;

use KetoFoodDbApi\Shared\Domain\Criteria\FilterValue;
use KetoFoodDbApi\Tests\Shared\Domain\WordMother;

final class FilterValueMother
{
    public static function create($value): FilterValue
    {
        return new FilterValue($value);
    }

    public static function random(): FilterValue
    {
        return self::create(WordMother::random());
    }
}
