<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 2/12/2020
 * Time: 8:55 PM
 */

namespace KetoFoodDbApi\Tests\Kfdb\FoodProduct\Domain;


use KetoFoodDbApi\Kfdb\FoodProduct\Domain\Manufacturer;
use KetoFoodDbApi\Tests\Shared\Domain\WordMother;

final class ManufacturerMother
{
    public static function create(string $manufacturer): Manufacturer
    {
        return new Manufacturer($manufacturer);
    }

    public static function random(): Manufacturer
    {
        return self::create(WordMother::random());
    }
}