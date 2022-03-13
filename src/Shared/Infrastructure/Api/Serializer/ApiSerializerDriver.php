<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Shared\Infrastructure\Api\Serializer;

use KetoFoodDbApi\Mooc\Students\Application\Find\StudentResponse;
use KetoFoodDbApi\Mooc\Videos\Application\Find\VideoResponse;
use KetoFoodDbApi\Shared\Infrastructure\Jms\KetoFoodDbApiSerializerDriver;

final class ApiSerializerDriver extends KetoFoodDbApiSerializerDriver
{
    public function __construct()
    {
        $this->addResourceFile(__FILE__);
    }

    public function getMetadata(): array
    {
        return [
            StudentResponse::class => [
                'id'                 => ['type' => 'string'],
                'name'               => ['type' => 'string'],
                'totalPendingVideos' => ['type' => 'string'],
            ],
            VideoResponse::class   => [
                'id'       => ['type' => 'string'],
                'type'     => ['type' => 'string'],
                'title'    => ['type' => 'string'],
                'url'      => ['type' => 'string'],
                'courseId' => ['type' => 'string'],
            ],
        ];
    }
}
