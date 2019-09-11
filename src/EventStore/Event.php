<?php

namespace App\EventStore;

use DateTimeImmutable;

class Event
{
    private $data = [];

    /**
     * @var string
     */
    private $type;

    /**
     * @var DateTimeImmutable
     */
    private $dateTime;

    public function __construct(string $type, array $data, DateTimeImmutable $dateTime)
    {
        $this->data = $data;
        $this->type = $type;
        $this->dateTime = $dateTime;
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
