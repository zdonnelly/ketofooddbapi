<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/21/2019
 * Time: 10:42 AM
 */

namespace KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain;


use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Calories;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Carbohydrate;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Fat;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Fiber;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\NutrientProfile;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Protein;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Sugar;
use KetoFoodDbApi\Kfdb\Shared\Domain\NutrientProfileId;

final class NutrientProfileMother
{
    public static function withId(NutrientProfileId $id): NutrientProfile
    {
        return self::create(
            CaloriesMother::random(),
            CarbohydrateMother::random(),
            FatMother::random(),
            FiberMother::random(),
            $id,
            ProteinMother::random(),
            SugarMother::random()
        );
    }

    public static function create(
        Calories $calories,
        Carbohydrate $carbohydrate,
        Fat $fat,
        Fiber $fiber,
        NutrientProfileId $profileId,
        Protein $protein,
        Sugar $sugar
    ) : NutrientProfile
    {
        return new NutrientProfile($calories, $carbohydrate, $fat, $fiber, $profileId, $protein, $sugar);
    }

    public static function random(): NutrientProfile
    {
        return self::create(
            CaloriesMother::random(),
            CarbohydrateMother::random(),
            FatMother::random(),
            FiberMother::random(),
            NutrientProfileIdMother::random(),
            ProteinMother::random(),
            SugarMother::random()
        );
    }
}