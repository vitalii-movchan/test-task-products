<?php

declare(strict_types=1);

namespace Framework\EventSourcing\Client\Contract;

use Prooph;

interface ClientInterface
{
    /**
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
    ): Prooph\EventStore\WriteResult;

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
    ): Prooph\EventStore\WriteResult;
}