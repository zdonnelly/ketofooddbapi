<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 2/12/2020
 * Time: 8:56 PM
 */

namespace KetoFoodDbApi\Tests\Kfdb\FoodProduct\Domain;


use KetoFoodDbApi\Kfdb\FoodProduct\Domain\FoodProduct;
use KetoFoodDbApi\Kfdb\FoodProduct\Domain\FoodProductId;
use KetoFoodDbApi\Kfdb\FoodProduct\Domain\Manufacturer;
use KetoFoodDbApi\Kfdb\FoodProduct\Domain\Name;
use KetoFoodDbApi\Kfdb\Shared\Domain\NutrientProfileId;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain\NutrientProfileIdMother;

class FoodProductMother
{
    public static function withId(FoodProductId $id): FoodProduct
    {
        return new FoodProduct(
            $id,
            ManufacturerMother::random(),
            NameMother::random(),
            NutrientProfileIdMother::random(),
        );
    }

    public static function create(
        FoodProductId $id,
        Manufacturer $manufacturer,
        Name $name,
        NutrientProfileId $profileId
    ): FoodProduct
    {
        return new FoodProduct(
            $id,
            $manufacturer,
            $name,
            $profileId,
        );
    }

    public static function random(): FoodProduct
    {
        $id = FoodProductIdMother::random();
        return self::withId($id);
    }
}