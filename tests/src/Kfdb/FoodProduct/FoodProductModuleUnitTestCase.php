<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 2/12/2020
 * Time: 9:00 PM
 */

namespace KetoFoodDbApi\Tests\Kfdb\FoodProduct;


use KetoFoodDbApi\Kfdb\FoodProduct\Domain\FoodProduct;
use KetoFoodDbApi\Kfdb\FoodProduct\Domain\FoodProductRepository;
use KetoFoodDbApi\Tests\Kfdb\Shared\Infrastructure\KfdbContextUnitTestCase;
use function KetoFoodDbApi\Tests\Shared\similarTo;

class FoodProductModuleUnitTestCase extends KfdbContextUnitTestCase
{
    private $repository;

    protected function repository()
    {
        return $this->repository = $this->repository
            ? $this->repository
            : $this->mock(FoodProductRepository::class);
    }

    protected function shouldSaveFoodProduct(FoodProduct $foodProduct): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with(similarTo($foodProduct))
            ->once()
            ->andReturnNull();
    }
}