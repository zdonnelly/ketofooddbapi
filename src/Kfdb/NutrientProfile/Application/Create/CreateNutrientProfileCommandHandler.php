<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/21/2019
 * Time: 11:16 AM
 */

namespace KetoFoodDbApi\Kfdb\NutrientProfile\Application\Create;


use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Calories;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Carbohydrate;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Fat;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Fiber;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\NutrientProfile;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Protein;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Sugar;
use KetoFoodDbApi\Kfdb\Shared\Domain\NutrientProfileId;

final class CreateNutrientProfileCommandHandler
{
    private NutrientProfileCreator $creator;

    public function __construct(NutrientProfileCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(CreateNutrientProfileCommand $command): void
    {
        $calories = new Calories($command->calories());
        $carbohydrate = new Carbohydrate($command->carbohydrate());
        $fat = new Fat($command->fat());
        $fiber = new Fiber($command->fiber());
        $profileId = new NutrientProfileId($command->id());
        $protein = new Protein($command->protein());
        $sugar = new Sugar($command->sugar());

        $this->creator->create(
            $profileId,
            $calories,
            $carbohydrate,
            $fat,
            $fiber,
            $protein,
            $sugar
        );
    }
}