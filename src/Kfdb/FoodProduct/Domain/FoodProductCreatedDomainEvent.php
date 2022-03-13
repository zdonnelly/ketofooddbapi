<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/22/2019
 * Time: 10:27 AM
 */

namespace KetoFoodDbApi\Kfdb\FoodProduct\Domain;


use KetoFoodDbApi\Shared\Domain\Bus\Event\DomainEvent;

class FoodProductCreatedDomainEvent extends DomainEvent
{

    protected function rules(): array
    {
        return [
          'manufacturer' => ['string'],
          'name' => ['string'],
          'nutrientProfileId' => ['string']
        ];
    }

    public static function eventName(): string
    {
        return "food_product_created";
    }
}