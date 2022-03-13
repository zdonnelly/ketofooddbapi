<?php

declare (strict_types = 1);

namespace KetoFoodDbApi\Shared\Domain\Bus;

use KetoFoodDbApi\Shared\Domain\ValueObject\Uuid;

abstract class Message
{
    private $messageId;

    public function __construct(Uuid $messageId)
    {
        $this->messageId = $messageId;
    }

    public function messageId(): Uuid
    {
        return $this->messageId;
    }

    abstract public function messageType(): string;
}
