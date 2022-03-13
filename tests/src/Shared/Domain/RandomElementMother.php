<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Domain;

final class RandomElementMother
{
    public static function from(array $choices)
    {
        return MotherCreator::random()->randomElement($choices);
    }
}
