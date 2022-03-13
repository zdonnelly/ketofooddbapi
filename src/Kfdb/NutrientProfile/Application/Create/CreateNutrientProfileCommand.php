<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/21/2019
 * Time: 11:01 AM
 */

namespace KetoFoodDbApi\Kfdb\NutrientProfile\Application\Create;


use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Calories;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\Carbohydrate;
use KetoFoodDbApi\Shared\Domain\Bus\Command\Command;
use KetoFoodDbApi\Shared\Domain\ValueObject\Uuid;

class CreateNutrientProfileCommand extends Command
{
    private $id;
    private $calories;
    private $carbohydrate;
    private $fat;
    private $fiber;
    private $protein;
    private $sugar;

    public function __construct(Uuid $commandId, string $id, int $calories, float $carbohydrate,
                                float $fat, float $fiber, float $protein, int $sugar)
    {
        parent::__construct($commandId);
        $this->id = $id;
        $this->calories = $calories;
        $this->carbohydrate = $carbohydrate;
        $this->fat = $fat;
        $this->fiber = $fiber;
        $this->protein = $protein;
        $this->sugar = $sugar;
    }

    public function id()
    {
        return $this->id;
    }

    public function calories()
    {
        return $this->calories;
    }

    public function carbohydrate()
    {
        return $this->carbohydrate;
    }

    public function fat()
    {
        return $this->fat;
    }

    public function fiber()
    {
        return $this->fiber;
    }

    public function protein()
    {
        return $this->protein;
    }


    public function sugar()
    {
        return $this->sugar;
    }

}