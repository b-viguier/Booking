<?php

namespace App\Tests;

use App\EventStore\Event;
use PHPUnit\Framework\TestCase;

class JsonFileSystemEventStoreTest extends TestCase
{
    public function testEventStoreCreatedFromEmptyDirectoryIsEmpty()
    {
        $eventStore = new \App\EventStore\JsonFileSystemEventStore(__DIR__ . '/fixtures/emptyStore.json');

        $this->assertEmpty(
            $eventStore->getEvents()
        );

    }

    public function testShouldAppendEventToStore()
    {
        $tmpFile = tmpfile();
        $fileName = stream_get_meta_data($tmpFile)['uri'];
        file_put_contents($fileName, '{}');

        $eventStore = new \App\EventStore\JsonFileSystemEventStore($fileName);
        $eventToAppend = new Event([
            'roomId' => 404
        ]);

        $eventStore->append($eventToAppend);
        $allEvents = $eventStore->getEvents();

        $this->assertEquals(
            [
                $eventToAppend
            ],
            $allEvents
        );
    }

    public function testShouldEventsBeSorted()
    {
        $tmpFile = tmpfile();
        $fileName = stream_get_meta_data($tmpFile)['uri'];
        file_put_contents($fileName, '{}');

        $eventStore = new \App\EventStore\JsonFileSystemEventStore($fileName);
        $eventsToAppend = [
            new Event(['order' => 1]),
            new Event(['order' => 2]),
            new Event(['order' => 3]),
        ];

        foreach ($eventsToAppend as $event) {
            $eventStore->append($event);
        }
        $allEvents = $eventStore->getEvents();

        $this->assertEquals(
            $eventsToAppend,
            $allEvents
        );
    }

}
