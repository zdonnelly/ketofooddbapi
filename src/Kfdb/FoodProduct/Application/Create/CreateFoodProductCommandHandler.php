<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 2/12/2020
 * Time: 8:35 PM
 */
declare(strict_types = 1);

namespace KetoFoodDbApi\Kfdb\FoodProduct\Application\Create;


use KetoFoodDbApi\Kfdb\FoodProduct\Domain\FoodProductId;
use KetoFoodDbApi\Kfdb\FoodProduct\Domain\Manufacturer;
use KetoFoodDbApi\Kfdb\FoodProduct\Domain\Name;
use KetoFoodDbApi\Kfdb\Shared\Domain\NutrientProfileId;
use KetoFoodDbApi\Shared\Domain\Bus\Command\CommandHandler;

final class CreateFoodProductCommandHandler implements CommandHandler
{
    private FoodProductCreator $creator;

    public function __construct(FoodProductCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(CreateFoodProductCommand $command)
    {
        $id = new FoodProductId($command->id());
        $manufacturer = new Manufacturer($command->manufacturer());
        $name = new Name($command->name());
        $profileId = new NutrientProfileId($command->profileId());
    }
}