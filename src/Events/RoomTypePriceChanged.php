<?php

namespace App\Events;

use App\EventStore\Event;
use DateTimeImmutable;

class RoomTypePriceChanged extends Event
{
    const eventType = 'room-type-price-changed';

    public function __construct(string $roomType, int $price, DateTimeImmutable $dateTime)
    {
        parent::__construct(self::eventType, [
            'type' => $roomType,
            'price' => $price,
        ], $dateTime);
    }
}
