<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/21/2019
 * Time: 11:29 AM
 */

namespace KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Application\Create;


use KetoFoodDbApi\Kfdb\NutrientProfile\Application\Create\CreateNutrientProfileCommandHandler;
use KetoFoodDbApi\Kfdb\NutrientProfile\Application\Create\NutrientProfileCreator;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain\CaloriesMother;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain\CarbohydrateMother;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain\FatMother;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain\FiberMother;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain\NutrientProfileIdMother;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain\NutrientProfileMother;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain\ProteinMother;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\Domain\SugarMother;
use KetoFoodDbApi\Tests\Kfdb\NutrientProfile\NutrientProfileModuleUnitTestCase;

final class CreateNutrientProfileTestCase extends NutrientProfileModuleUnitTestCase
{

    private $handler;

    public function setUp(): void
    {
        parent::setUp();
        $creator = new NutrientProfileCreator($this->repository());
        $this->handler = new CreateNutrientProfileCommandHandler($creator);
    }

    /** @test */
    public function it_should_create_a_nutrientProfile(): void
    {
        $command = CreateNutrientProfileCommandMother::random();

        $id = NutrientProfileIdMother::create($command->id());
        $calories = CaloriesMother::create($command->calories());
        $carbohydrates = CarbohydrateMother::create($command->carbohydrate());
        $fat = FatMother::create($command->fat());
        $fiber = FiberMother::create($command->fiber());
        $protein = ProteinMother::create($command->protein());
        $sugar = SugarMother::create($command->sugar());

        $nutrientProfile = NutrientProfileMother::create(
            $calories,
            $carbohydrates,
            $fat,
            $fiber,
            $id,
            $protein,
            $sugar
        );

        $this->shouldSaveNutrientProfile($nutrientProfile);

        $this->dispatch($command, $this->handler);
    }
}