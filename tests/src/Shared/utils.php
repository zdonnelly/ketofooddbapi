<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared;

use KetoFoodDbApi\Tests\Shared\Infrastructure\Mockery\KetoFoodDbApiMatcherIsEqual;
use KetoFoodDbApi\Tests\Shared\Infrastructure\Mockery\KetoFoodDbApiMatcherIsSimilar;
use KetoFoodDbApi\Tests\Shared\Infrastructure\PHPUnit\Constraint\KetoFoodDbApiConstraintIsEqual;
use KetoFoodDbApi\Tests\Shared\Infrastructure\PHPUnit\Constraint\KetoFoodDbApiConstraintIsSimilar;
use PHPUnit\Framework\Assert;

function isSimilar($expected, $value, $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
{
    $constraint = new KetoFoodDbApiConstraintIsSimilar($expected, $delta, $maxDepth, $canonicalize, $ignoreCase);

    return $constraint->evaluate($value, '', true);
}

function assertSimilar(
    $expected,
    $actual,
    $message = '',
    $delta = 0.0,
    $maxDepth = 10,
    $canonicalize = false,
    $ignoreCase = false
) {
    $constraint = new KetoFoodDbApiConstraintIsSimilar($expected, $delta, $maxDepth, $canonicalize, $ignoreCase);

    Assert::assertThat($actual, $constraint, $message);
}

function similarTo($value, $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
{
    return KetoFoodDbApiMatcherIsSimilar::equalTo($value, $delta, $maxDepth, $canonicalize, $ignoreCase);
}

function isEqual($expected, $value, $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
{
    $constraint = new KetoFoodDbApiConstraintIsEqual($expected, $delta, $maxDepth, $canonicalize, $ignoreCase);

    return $constraint->evaluate($value, '', true);
}

function assertEquals(
    $expected,
    $actual,
    $message = '',
    $delta = 0.0,
    $maxDepth = 10,
    $canonicalize = false,
    $ignoreCase = false
) {
    $constraint = new KetoFoodDbApiConstraintIsEqual($expected, $delta, $maxDepth, $canonicalize, $ignoreCase);

    Assert::assertThat($actual, $constraint, $message);
}

function equalTo($value, $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
{
    return KetoFoodDbApiMatcherIsEqual::equalTo($value, $delta, $maxDepth, $canonicalize, $ignoreCase);
}
