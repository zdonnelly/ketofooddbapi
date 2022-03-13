<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 2/12/2020
 * Time: 8:53 PM
 */

namespace KetoFoodDbApi\Tests\Kfdb\FoodProduct\Domain;


use KetoFoodDbApi\Kfdb\FoodProduct\Domain\FoodProductId;
use KetoFoodDbApi\Tests\Shared\Domain\UuidMother;

final class FoodProductIdMother
{
    public static function create(string $id): FoodProductId
    {
        return new FoodProductId($id);
    }

    public static function random(): FoodProductId
    {
        return self::create(UuidMother::random());
    }
}