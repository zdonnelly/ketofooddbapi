<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/21/2019
 * Time: 11:00 AM
 */

namespace KetoFoodDbApi\Kfdb\NutrientProfile\Application\Create;


use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Calories;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Carbohydrate;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Fat;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Fiber;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\NutrientProfile;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\NutrientProfileRepository;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Protein;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Sugar;
use KetoFoodDbApi\Kfdb\Shared\Domain\NutrientProfileId;

final class NutrientProfileCreator
{
    private NutrientProfileRepository $repository;

    public function __construct(NutrientProfileRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(NutrientProfileId $id, Calories $calories, Carbohydrate $carbohydrate,
                           Fat $fat, Fiber $fiber, Protein $protein, Sugar $sugar): void {
        $nutrientProfile = NutrientProfile::create(
            $calories,
            $carbohydrate,
            $fat,
            $fiber,
            $id,
            $protein,
            $sugar
        );

        $this->repository->save($nutrientProfile);
    }
}