<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Enum;

use KetoFoodDbApi\Shared\Domain\ValueObject\Enum;

/**
 * @method static NumberTestEnum one()
 * @method static NumberTestEnum two()
 */
final class NumberTestEnum extends Enum
{
    public const ONE = 1;
    public const TWO = 2;

    protected function throwExceptionForInvalidValue($unused): void
    {
        // Not necessary for the test
    }
}
