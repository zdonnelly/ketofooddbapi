<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 12/21/2019
 * Time: 10:52 AM
 */

namespace KetoFoodDbApi\Kfdb\NutrientProfile\Domain;


interface NutrientProfileRepository
{
    public function save(NutrientProfile $profile): void;

    public function search(NutrientProfileId $id): ?NutrientProfile;
}