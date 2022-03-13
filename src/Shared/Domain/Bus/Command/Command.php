<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Shared\Domain\Bus\Command;

use KetoFoodDbApi\Shared\Domain\Bus\Request;
use KetoFoodDbApi\Shared\Domain\ValueObject\Uuid;

abstract class Command extends Request
{
    public function commandId(): Uuid
    {
        return $this->requestId();
    }

    public function messageType(): string
    {
        return 'command';
    }
}
