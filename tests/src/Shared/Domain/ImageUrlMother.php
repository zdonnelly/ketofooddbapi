<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Domain;

final class ImageUrlMother
{
    public static function random(): string
    {
        return MotherCreator::random()->imageUrl();
    }
}
