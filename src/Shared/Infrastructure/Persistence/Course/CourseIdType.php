<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Shared\Infrastructure\Persistence\Course;

use KetoFoodDbApi\Mooc\Shared\Domain\Courses\CourseId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class CourseIdType extends StringType
{
    public const NAME = 'course_id';

    public function getName(): string
    {
        return static::NAME;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new CourseId($value);
    }

    /** @var CourseId $value */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->value();
    }
}

