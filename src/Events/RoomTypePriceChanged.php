<?php

namespace App\Events;

use App\EventStore\Event;
use DateTimeImmutable;

class RoomTypePriceChanged extends Event
{
    public function __construct(string $roomType, int $price, DateTimeImmutable $dateTime)
    {
        parent::__construct('RoomTypePriceChanged', [
            'type' => $roomType,
            'price' => $price,
        ], $dateTime);
    }
}
