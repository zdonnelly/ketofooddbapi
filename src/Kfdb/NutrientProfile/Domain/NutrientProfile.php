<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/21/2019
 * Time: 9:41 AM
 */

namespace KetoFoodDbApi\Kfdb\NutrientProfile\Domain;


use KetoFoodDbApi\Kfdb\Shared\Domain\NutrientProfileId;

final class NutrientProfile
{
    private Calories $calories;
    private Carbohydrate $carbohydrate;
    private Fat $fat;
    private Fiber $fiber;
    private NutrientProfileId $profileId;
    private Protein $protein;
    private Sugar $sugar;

    public function __construct(
        Calories $calories,
        Carbohydrate $carbohydrate,
        Fat $fat,
        Fiber $fiber,
        NutrientProfileId $profileId,
        Protein $protein,
        Sugar $sugar
    ) {
        $this->calories = $calories;
        $this->carbohydrate = $carbohydrate;
        $this->fat = $fat;
        $this->fiber = $fiber;
        $this->profileId = $profileId;
        $this->protein = $protein;
        $this->sugar = $sugar;
    }

    public static function create(
        Calories $calories,
        Carbohydrate $carbohydrate,
        Fat $fat,
        Fiber $fiber,
        NutrientProfileId $profileId,
        Protein $protein,
        Sugar $sugar
    ): NutrientProfile {
        return new self($calories, $carbohydrate, $fat, $fiber, $profileId, $protein, $sugar);
    }

    public function calories(): Calories
    {
        return $this->calories;
    }

    public function carbohydrate(): Carbohydrate
    {
        return $this->carbohydrate;
    }

    public function fat(): Fat
    {
        return $this->fat;
    }

    public function fiber(): Fiber
    {
        return $this->fiber;
    }

    public function profileId(): NutrientProfileId
    {
        return $this->profileId;
    }

    public function protein(): Protein
    {
        return $this->protein;
    }

    public function sugar(): Sugar
    {
        return $this->sugar;
    }
}