<?php

namespace App\EventStore;

class JsonFileSystemEventStore implements EventStore
{

    /** @var string */
    private $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function append(Event $event): void
    {
        $store = json_decode(file_get_contents($this->file), true);
        $store[] = $event->toJson();
        file_put_contents($this->file, json_encode($store));
    }

    public function getEvents(): array
    {
        $store = json_decode(file_get_contents($this->file), true);
        if($store === null) {
            throw new \Exception("Impossible to read File");
        }
        return array_map([Event::class, 'fromJson'], $store);
    }

}
