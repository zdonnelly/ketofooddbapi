<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 2/12/2020
 * Time: 9:03 PM
 */

namespace KetoFoodDbApi\Tests\Kfdb\FoodProduct\Application\Create;


use KetoFoodDbApi\Kfdb\FoodProduct\Application\Create\CreateFoodProductCommand;
use KetoFoodDbApi\Kfdb\FoodProduct\Domain\FoodProductId;
use KetoFoodDbApi\Kfdb\FoodProduct\Domain\Manufacturer;
use KetoFoodDbApi\Kfdb\FoodProduct\Domain\Name;
use KetoFoodDbApi\Kfdb\Shared\Domain\NutrientProfileId;
use KetoFoodDbApi\Shared\Domain\ValueObject\Uuid;
use KetoFoodDbApi\Tests\Kfdb\FoodProduct\Domain\FoodProductIdMother;
use KetoFoodDbApi\Tests\Kfdb\FoodProduct\Domain\ManufacturerMother;
use KetoFoodDbApi\Tests\Kfdb\FoodProduct\Domain\NameMother;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain\NutrientProfileIdMother;
use KetoFoodDbApi\Tests\Shared\Domain\UuidMother;

final class CreateFoodProductCommandMother
{
    public static function create(
        Uuid $requestId,
        FoodProductId $id,
        Manufacturer $manufacturer,
        Name $name,
        NutrientProfileId $profileId
    )
    {
        return new CreateFoodProductCommand($requestId, $id, $manufacturer, $name, $profileId);
    }

    public static function random()
    {
        return self::create(
            new Uuid(UuidMother::random()),
            FoodProductIdMother::random(),
            ManufacturerMother::random(),
            NameMother::random(),
            NutrientProfileIdMother::random(),
        );
    }
}