<?php

declare (strict_types = 1);

namespace KetoFoodDbApi\Shared\Infrastructure\Bus\Middleware;

use KetoFoodDbApi\Shared\Domain\Bus\Message;

interface Middleware
{
    public function __invoke(Message $message, callable $handler): ?callable;
}
