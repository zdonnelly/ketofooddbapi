<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Tests\Shared\Infrastructure\Mockery;

use KetoFoodDbApi\Tests\Shared\Infrastructure\PHPUnit\Constraint\KetoFoodDbApiConstraintIsEqual;
use Mockery\Matcher\MatcherAbstract;

final class KetoFoodDbApiMatcherIsEqual extends MatcherAbstract
{
    private $constraint;

    public function __construct($value, $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        parent::__construct($value);

        $this->constraint = new KetoFoodDbApiConstraintIsEqual($value, $delta, $maxDepth, $canonicalize, $ignoreCase);
    }

    public static function equalTo($value, $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        return new static($value, $delta, $maxDepth, $canonicalize, $ignoreCase);
    }

    public function match(&$actual)
    {
        return $this->constraint->evaluate($actual, '', true);
    }

    public function __toString()
    {
        return 'Is equal';
    }
}
