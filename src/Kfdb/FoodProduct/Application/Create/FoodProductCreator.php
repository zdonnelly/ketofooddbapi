<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 2/12/2020
 * Time: 8:42 PM
 */

namespace KetoFoodDbApi\Kfdb\FoodProduct\Application\Create;


use KetoFoodDbApi\Kfdb\FoodProduct\Domain\FoodProduct;
use KetoFoodDbApi\Kfdb\FoodProduct\Domain\FoodProductId;
use KetoFoodDbApi\Kfdb\FoodProduct\Domain\FoodProductRepository;
use KetoFoodDbApi\Kfdb\FoodProduct\Domain\Manufacturer;
use KetoFoodDbApi\Kfdb\FoodProduct\Domain\Name;
use KetoFoodDbApi\Kfdb\Shared\Domain\NutrientProfileId;
use KetoFoodDbApi\Shared\Domain\Bus\Event\EventBus;

final class FoodProductCreator
{
    private FoodProductRepository $repository;
    private EventBus $bus;

    public function __construct(FoodProductRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->bus = $bus;
    }

    public function __invoke(
        FoodProductId $id,
        Manufacturer $manufacturer,
        Name $name,
        NutrientProfileId $profileId
    ): void
    {
        $foodProduct = FoodProduct::create($id, $manufacturer, $name, $profileId);
        $this->repository->save($foodProduct);
        $this->bus->notify(...$foodProduct->pullDomainEvents());
    }
}