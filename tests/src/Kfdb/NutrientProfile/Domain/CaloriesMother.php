<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/21/2019
 * Time: 10:23 AM
 */

namespace KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain;


use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Calories;
use KetoFoodDbApi\Tests\Shared\Domain\NumberMother;

final class CaloriesMother
{
    public static function create(int $value): Calories
    {
        return new Calories($value);
    }

    public static function random(): Calories
    {
        return new Calories(NumberMother::random());
    }
}