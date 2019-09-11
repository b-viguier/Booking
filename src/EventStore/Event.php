<?php

namespace App\EventStore;

class Event
{
    private $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function toJson(): array
    {
        return $this->data;
    }

    static public function fromJson(array $json): self
    {
        return new self($json);
    }
}
