<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Domain;

use DateTimeImmutable;
use function KetoFoodDbApi\Utils\Shared\date_to_string;

final class DateTimestampMother
{
    public static function create(string $date): string
    {
        return date_to_string(new DateTimeImmutable($date));
    }

    public static function random(): string
    {
        return date_to_string(new DateTimeImmutable());
    }
}
