<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/21/2019
 * Time: 10:04 AM
 */

namespace KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain;

use KetoFoodDbApi\Kfdb\Shared\Domain\NutrientProfileId;
use KetoFoodDbApi\Tests\Shared\Domain\UuidMother;

final class NutrientProfileIdMother
{
    public static function create(string $id): NutrientProfileId
    {
        return new NutrientProfileId($id);
    }

    public static function random(): NutrientProfileId
    {
        return self::create(UuidMother::random());
    }
}