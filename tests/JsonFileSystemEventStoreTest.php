<?php

namespace App\Tests;

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


}
