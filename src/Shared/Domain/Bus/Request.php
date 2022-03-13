<?php

declare (strict_types = 1);

namespace KetoFoodDbApi\Shared\Domain\Bus;

use KetoFoodDbApi\Shared\Domain\ValueObject\Uuid;

abstract class Request extends Message
{
    public function requestId(): Uuid
    {
        return $this->messageId();
    }
}
