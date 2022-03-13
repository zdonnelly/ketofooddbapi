<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Infrastructure\PHPUnit\Constraint;

use KetoFoodDbApi\Tests\Shared\Infrastructure\PHPUnit\Comparator\AggregateRootArraySimilarComparator;
use KetoFoodDbApi\Tests\Shared\Infrastructure\PHPUnit\Comparator\AggregateRootSimilarComparator;
use KetoFoodDbApi\Tests\Shared\Infrastructure\PHPUnit\Comparator\DateTimeSimilarComparator;
use KetoFoodDbApi\Tests\Shared\Infrastructure\PHPUnit\Comparator\DateTimeStringSimilarComparator;
use KetoFoodDbApi\Tests\Shared\Infrastructure\PHPUnit\Comparator\DomainEventArraySimilarComparator;
use KetoFoodDbApi\Tests\Shared\Infrastructure\PHPUnit\Comparator\DomainEventSimilarComparator;
use KetoFoodDbApi\Tests\Shared\Infrastructure\PHPUnit\Comparator\StringableObjectSimilarComparator;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\ExpectationFailedException;
use SebastianBergmann\Comparator\ComparisonFailure;
use SebastianBergmann\Comparator\Factory;

final class KetoFoodDbApiConstraintIsSimilar extends IsEqual
{
    public function evaluate($other, $description = '', $returnResult = false)
    {
        $isValid           = true;
        $comparatorFactory = new Factory();

        $comparatorFactory->register(new AggregateRootArraySimilarComparator());
        $comparatorFactory->register(new AggregateRootSimilarComparator());
        $comparatorFactory->register(new DomainEventArraySimilarComparator());
        $comparatorFactory->register(new DomainEventSimilarComparator());
        $comparatorFactory->register(new DateTimeSimilarComparator());
        $comparatorFactory->register(new DateTimeStringSimilarComparator());
        $comparatorFactory->register(new StringableObjectSimilarComparator());

        try {
            $comparator = $comparatorFactory->getComparatorFor($other, $this->value);

            $comparator->assertEquals($this->value, $other, $this->delta);
        } catch (ComparisonFailure $f) {
            if (!$returnResult) {
                throw new ExpectationFailedException(
                    trim($description . "\n" . $f->getMessage()),
                    $f
                );
            }

            $isValid = false;
        }

        return $isValid;
    }
}
