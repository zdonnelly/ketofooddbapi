<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/21/2019
 * Time: 11:46 AM
 */

namespace KetoFoodDbApi\Tests\Kfdb\NutrientProfile;


use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\NutrientProfile;
use KetoFoodDbApi\Kfdb\NutrientProfile\Domain\NutrientProfileRepository;
use KetoFoodDbApi\Tests\Kfdb\Shared\Infrastructure\KfdbContextUnitTestCase;
use function KetoFoodDbApi\Tests\Shared\similarTo;
use Mockery\MockInterface;

class NutrientProfileModuleUnitTestCase extends KfdbContextUnitTestCase
{

    private $repository;

    /**
     * @return NutrientProfileRepository|MockInterface
     */
    protected function repository()
    {
        return $this->repository = $this->repository ?: $this->mock(NutrientProfileRepository::class);
    }

    protected function shouldSaveNutrientProfile(NutrientProfile $profile): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with(similarTo($profile))
            ->once()
            ->andReturnNull();
    }

}