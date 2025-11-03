<?php

declare(strict_types=1);

namespace Framework\EventSourcing\EventStore\Contract;

use Ecotone;

/**
 * @see https://docs.ecotone.tech/modelling/event-sourcing/event-sourcing-introduction/working-with-event-streams
 */
interface EventStoreInterface
{
    /**
     * Creates new Stream with Metadata and appends events to it
     *
     * @param Ecotone\Modelling\Event[] $streamEvents
     */
    public function create(string $streamName, array $streamEvents = [], array $streamMetadata = []): void;

    /**
     * Appends events to existing Stream, or creates one and then appends events if it does not exist
     *
     * @param Ecotone\Modelling\Event[] $streamEvents
     */
    public function appendTo(string $streamName, array $streamEvents): void;
}