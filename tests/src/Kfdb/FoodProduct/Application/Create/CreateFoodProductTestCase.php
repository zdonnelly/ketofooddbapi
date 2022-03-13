<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 2/12/2020
 * Time: 9:08 PM
 */

namespace KetoFoodDbApi\Tests\Kfdb\FoodProduct\Application\Create;


use KetoFoodDbApi\Kfdb\FoodProduct\Application\Create\FoodProductCreator;
use KetoFoodDbApi\Tests\Kfdb\FoodProduct\FoodProductModuleUnitTestCase;

class CreateFoodProductTestCase extends FoodProductModuleUnitTestCase
{
    private $handler;

    public function setUp(): void
    {
        parent::setUp();
        $creator = new FoodProductCreator($this->repository(),);
    }
}