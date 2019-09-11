<?php

namespace App\EventStore;

class Event
{
    public function toJson(): array
    {
        return [];
    }

    static public function fromJson(array $json): self
    {
        return new self();
    }
}
