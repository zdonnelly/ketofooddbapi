<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/21/2019
 * Time: 11:31 AM
 */

namespace KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Application\Create;


use KetoFoodDbApi\Kfdb\NutrientProfile\Application\Create\CreateNutrientProfileCommand;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Calories;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Carbohydrate;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Fat;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Fiber;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Protein;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Sugar;
use KetoFoodDbApi\Kfdb\Shared\Domain\NutrientProfileId;
use KetoFoodDbApi\Shared\Domain\ValueObject\Uuid;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain\CaloriesMother;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain\CarbohydrateMother;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain\FatMother;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain\FiberMother;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain\NutrientProfileIdMother;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain\ProteinMother;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain\SugarMother;
use KetoFoodDbApi\Tests\Shared\Domain\UuidMother;

final class CreateNutrientProfileCommandMother
{
    public static function create(
        Uuid $requestId,
        NutrientProfileId $id,
        Calories $calories,
        Carbohydrate $carbohydrate,
        Fat $fat,
        Fiber $fiber,
        Protein $protein,
        Sugar $sugar
    ): CreateNutrientProfileCommand
    {
        return new CreateNutrientProfileCommand(
            $requestId,
            $id->value(),
            $calories->value(),
            $carbohydrate->value(),
            $fat->value(),
            $fiber->value(),
            $protein->value(),
            $sugar->value()
        );
    }

    public static function random(): CreateNutrientProfileCommand
    {
        return self::create(
            new Uuid(UuidMother::random()),
            NutrientProfileIdMother::random(),
            CaloriesMother::random(),
            CarbohydrateMother::random(),
            FatMother::random(),
            FiberMother::random(),
            ProteinMother::random(),
            SugarMother::random()
        );
    }
}