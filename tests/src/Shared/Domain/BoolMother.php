<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Domain;

final class BoolMother
{
    public static function random(): bool
    {
        return MotherCreator::random()->boolean;
    }
}
