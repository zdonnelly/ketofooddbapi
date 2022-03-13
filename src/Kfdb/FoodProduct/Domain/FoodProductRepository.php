<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 2/12/2020
 * Time: 8:31 PM
 */

namespace KetoFoodDbApi\Kfdb\FoodProduct\Domain;


interface FoodProductRepository
{
    public function save(FoodProduct $foodProduct): void;

    public function search(FoodProductId $id): ?FoodProduct;
}