<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 2/12/2020
 * Time: 8:54 PM
 */

namespace KetoFoodDbApi\Tests\Kfdb\FoodProduct\Domain;


use KetoFoodDbApi\Kfdb\FoodProduct\Domain\Name;
use KetoFoodDbApi\Tests\Shared\Domain\WordMother;

final class NameMother
{
    public static function create(string $name): Name
    {
        return new Name($name);
    }

    public static function random(): Name
    {
        return self::create(WordMother::random());
    }
}