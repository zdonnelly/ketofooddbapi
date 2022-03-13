<?php
/**
 * Author: Zach Donnelly <zach@solutioncraft.net>
 * Date: 2/12/2020
 * Time: 8:30 PM
 */
declare(strict_types = 1);

namespace KetoFoodDbApi\Kfdb\FoodProduct\Application\Create;


use KetoFoodDbApi\Shared\Domain\Bus\Command\Command;
use KetoFoodDbApi\Shared\Domain\ValueObject\Uuid;

final class CreateFoodProductCommand extends Command
{
    private $id;
    private $manufacturer;
    private $name;
    private $profileId;

    public function __construct(Uuid $commandId, string $id, string $manufacturer, string $name, string $profileId)
    {
        parent::__construct($commandId);
        $this->id = $id;
        $this->manufacturer = $manufacturer;
        $this->name = $name;
        $this->profileId = $profileId;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function manufacturer(): string
    {
        return $this->manufacturer;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function profileId(): string
    {
        return $this->profileId;
    }
}