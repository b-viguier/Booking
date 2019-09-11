<?php

namespace App\Events;

use App\EventStore\Event;
use DateTimeImmutable;

class RoomAddedToInventory extends Event
{
    public function __construct(int $roomId, string $roomType, DateTimeImmutable $dateTime)
    {
        parent::__construct('RoomAddedToInventory', [
            'id' => $roomId,
            'type' => $roomType,
        ], $dateTime);
    }
}
