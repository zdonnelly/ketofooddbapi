<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/21/2019
 * Time: 10:34 AM
 */

namespace KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain;


use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Protein;
use KetoFoodDbApi\Tests\Shared\Domain\NumberMother;

final class ProteinMother
{
    public static function create(float $value): Protein
    {
        return new Protein($value);
    }

    public static function random(): Protein
    {
        return new Protein(NumberMother::float(1));
    }
}