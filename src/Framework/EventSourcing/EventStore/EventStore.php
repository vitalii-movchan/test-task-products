<?php

namespace Framework\EventSourcing\EventStore;

use Ecotone;
use Framework;
use Prooph;

/**
 * @see https://getprooph.org/docs/html/event-store/event_store.html?ref=blog.ecotone.tech
 * @see https://docs.ecotone.tech/modelling/event-sourcing/event-sourcing-introduction/working-with-event-streams
 *
 * @see EventStoreNodeConnection
 */
final readonly class EventStore implements
    Contract\EventStoreInterface
{
    /**
     * @param Framework\EventSourcing\Client\Client $client
     */
    public function __construct(
        private Framework\EventSourcing\Client\Client $client,
    )
    {

    }

    /**
     * Creates new Stream with Metadata and appends events to it
     *
     *
     *
     * @param Ecotone\Modelling\Event[] $streamEvents
     */
    public function create(
        string $streamName,
        array $streamEvents = [],
        array $streamMetadata = []
    ): void
    {
       /* $this->client
            ->setStreamMetadata(
                stream: $streamName,
                expectedMetaStreamVersion: $streamMetadataVersion,
                metadata: $streamMetadata
            );

        $this->client
            ->setStreamMetadata(
                stream: $streamName,
                expectedMetaStreamVersion: $streamMetadataVersion,
                metadata: $streamMetadata
            );*/
    }

    /**
     * Appends events to existing Stream, or creates one and then appends events if it does not exist
     *
     *      $eventStore->appendTo(
     *          "ticket",
     *          [
     *              new TicketWasRegistered('124', 'critical'),
     *          ]
     *      );
     *
     * @param Ecotone\Modelling\Event[] $streamEvents
     */
    public function appendTo(
        string $streamName,
        array  $streamEvents,
        string $aggregateVersion = Prooph\EventStore\ExpectedVersion::Any
    ): void
    {

        $this->client
            ->appendToStream(
                stream: $streamName,
                expectedVersion: $aggregateVersion,
                events: []
            );
    }
}