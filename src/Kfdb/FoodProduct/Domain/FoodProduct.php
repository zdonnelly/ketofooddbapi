<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/21/2019
 * Time: 9:38 AM
 */

namespace KetoFoodDbApi\Kfdb\FoodProduct\Domain;


use KetoFoodDbApi\Kfdb\Shared\Domain\NutrientProfileId;
use KetoFoodDbApi\Shared\Domain\Aggregate\AggregateRoot;

final class FoodProduct extends AggregateRoot
{
    private FoodProductId $id;
    private Manufacturer $manufacturer;
    private Name $name;
    private NutrientProfileId $nutrientProfileId;

    public function __construct(FoodProductId $id, Manufacturer $manufacturer,
                                Name $name, NutrientProfileId $nutrientProfileId)
    {
        $this->id = $id;
        $this->manufacturer = $manufacturer;
        $this->name = $name;
        $this->nutrientProfileId = $nutrientProfileId;
    }

    public static function create(
        FoodProductId $id,
        Manufacturer $manufacturer,
        Name $name,
        NutrientProfileId $nutrientProfileId)
    {
        $foodProduct = new self($id, $manufacturer, $name, $nutrientProfileId);

        $foodProduct->record(new FoodProductCreatedDomainEvent(
            $id->value(),
            [
                'manufacturer' => $manufacturer->value(),
                'name' => $name->value(),
                'nutrientProfileId' => $nutrientProfileId->value(),
            ]
        ));
        return $foodProduct;
    }

    public function id(): FoodProductId
    {
        return $this->id;
    }

    public function manufacturer(): Manufacturer
    {
        return $this->manufacturer;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function updateNutrientProfile(NutrientProfileId $nutrientProfileId): void
    {
        $this->nutrientProfileId = $nutrientProfileId;
    }
}