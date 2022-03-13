<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Shared\Infrastructure\Bus\Command;

use KetoFoodDbApi\Shared\Domain\Bus\Command\Command;
use KetoFoodDbApi\Shared\Domain\DomainError;

final class CommandNotRegisteredError extends DomainError
{
    private $command;

    public function __construct(Command $command)
    {
        $this->command = $command;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'command_bus_not_registered_error';
    }

    protected function errorMessage(): string
    {
        return sprintf('The command <%s> has not been registered', get_class($this->command));
    }
}
