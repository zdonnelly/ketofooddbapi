<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/21/2019
 * Time: 10:36 AM
 */

namespace KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain;


use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Fiber;
use KetoFoodDbApi\Tests\Shared\Domain\NumberMother;

final class FiberMother
{
    public static function create(float $value): Fiber
    {
        return new Fiber($value);
    }

    public static function random(): Fiber
    {
        return new Fiber(NumberMother::float(1));
    }
}