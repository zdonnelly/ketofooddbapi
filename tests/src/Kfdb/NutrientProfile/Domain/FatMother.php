<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/21/2019
 * Time: 10:33 AM
 */

namespace KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain;


use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Fat;
use KetoFoodDbApi\Tests\Shared\Domain\NumberMother;

final class FatMother
{
    public static function create(float $value): Fat
    {
        return new Fat($value);
    }

    public static function random(): Fat
    {
        return new Fat(NumberMother::float(1));
    }
}