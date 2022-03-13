<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Domain\Criteria;

use KetoFoodDbApi\Shared\Domain\Criteria\Filter;
use KetoFoodDbApi\Shared\Domain\Criteria\FilterField;
use KetoFoodDbApi\Shared\Domain\Criteria\FilterOperator;
use KetoFoodDbApi\Shared\Domain\Criteria\FilterValue;

final class FilterMother
{
    public static function create(FilterField $field, FilterOperator $operator, FilterValue $value): Filter
    {
        return new Filter($field, $operator, $value);
    }

    public static function fromValues($values): Filter
    {
        return Filter::fromValues($values);
    }

    public static function random(): Filter
    {
        return self::create(FilterFieldMother::random(), FilterOperator::random(), FilterValueMother::random());
    }
}
