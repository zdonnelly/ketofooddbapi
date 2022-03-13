<?php

declare (strict_types = 1);

namespace KetoFoodDbApi\Shared\Infrastructure\Bus\Command;

use KetoFoodDbApi\Shared\Domain\Bus\Command\Command;
use KetoFoodDbApi\Shared\Domain\Bus\Command\CommandBus;
use KetoFoodDbApi\Shared\Domain\Bus\MessageSerializer;
use function Lambdish\Phunctional\apply;

class CommandBusAsync implements CommandBus
{
    private $pendingRequestsFilePath;

    public function __construct(string $pendingRequestsFilePath)
    {
        $this->pendingRequestsFilePath = $pendingRequestsFilePath;
    }

    public function dispatch(Command $command): void
    {
        file_put_contents($this->pendingRequestsFilePath, apply(new MessageSerializer(), [$command]));
    }
}
