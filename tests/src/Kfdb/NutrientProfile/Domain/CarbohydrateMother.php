<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/21/2019
 * Time: 10:29 AM
 */

namespace KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain;


use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Carbohydrate;
use KetoFoodDbApi\Tests\Shared\Domain\NumberMother;

final class CarbohydrateMother
{
    public static function create(float $value) : Carbohydrate
    {
        return new Carbohydrate($value);
    }

    public static function random(): Carbohydrate
    {
        return new Carbohydrate(NumberMother::float(1));
    }
}