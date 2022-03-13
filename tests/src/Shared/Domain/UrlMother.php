<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Domain;

final class UrlMother
{
    public static function random(): string
    {
        return MotherCreator::random()->url;
    }
}
