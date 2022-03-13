<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/21/2019
 * Time: 10:35 AM
 */

namespace KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain;


use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Sugar;
use KetoFoodDbApi\Tests\Shared\Domain\NumberMother;

final class SugarMother
{
    public static function create(int $value): Sugar
    {
        return new Sugar($value);
    }

    public static function random(): Sugar
    {
        return new Sugar(NumberMother::between(1, 1000));
    }
}