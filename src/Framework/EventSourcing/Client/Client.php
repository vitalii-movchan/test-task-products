<?php

namespace Framework\EventSourcing\Client;

use Prooph;
use Framework;

final readonly class Client implements
    Framework\EventSourcing\Client\Contract\ClientInterface
{
    /**
     * @param Prooph\EventStore\EventStoreConnection $connection
     */
    public function __construct(
        private Prooph\EventStore\EventStoreConnection $connection,
    )
    {
    }

    /**
     * Creates new Stream with Metadata and appends events to it
     *
     * @param string $stream
     * @param int $expectedMetaStreamVersion
     * @param Prooph\EventStore\StreamMetadata|null $metadata
     * @param Prooph\EventStore\UserCredentials|null $userCredentials
     * @return Prooph\EventStore\WriteResult
     */
    public function setStreamMetadata
    (
        string                            $stream,
        int                               $expectedMetaStreamVersion = Prooph\EventStore\ExpectedVersion::Any,
        Prooph\EventStore\StreamMetadata  $metadata = null,
        Prooph\EventStore\UserCredentials $userCredentials = null
    ): Prooph\EventStore\WriteResult
    {
        return $this->connection
            ->setStreamMetadata(
                stream: $stream,
                expectedMetaStreamVersion: $expectedMetaStreamVersion,
                metadata: $metadata,
                userCredentials: $userCredentials,
            );
    }

    /**
     * @param string $stream
     * @param string $expectedVersion
     * @param Prooph\EventStore\EventData[] $events
     * @param Prooph\EventStore\UserCredentials|null $userCredentials
     * @return Prooph\EventStore\WriteResult
     */
    public function appendToStream
    (
        string $stream,
        string  $expectedVersion,
        array $events = [],
        Prooph\EventStore\UserCredentials $userCredentials = null
    ): Prooph\EventStore\WriteResult
    {
        return $this->connection
            ->appendToStream(
                stream: $stream,
                expectedVersion: $expectedVersion,
                events: $events,
                userCredentials: $userCredentials,
            );
    }
}