<?php

declare(strict_types=1);

namespace Application\Repository\Event\Stream;

use Core;
use Ecotone;
#use Ecotone\Modelling\Event;
use Framework;

#[Ecotone\Modelling\Attribute\Repository]
final readonly class ProductEventStreamRepository implements
    Ecotone\Modelling\StandardRepository
{
    /**
     * @param Framework\EventSourcing\EventStore\Contract\EventStoreInterface $eventStore
     */
    public function __construct(
   //     private Framework\EventSourcing\EventStore\Contract\EventStoreInterface $eventStore,
    )
    {
    }

    public function canHandle(string $aggregateClassName): bool
    {
        return $aggregateClassName === Core\Aggregate\Product::class;
    }

    public function findBy(string $aggregateClassName, array $identifiers): ?object
    {
        echo 'findBy: ' . $identifiers['uuid'] . PHP_EOL;
        $test = 'findBy:' ;

        return new Core\Aggregate\Product();
    }

    public function save(
        array $identifiers,
        object $aggregate,
        array $metadata,
        int $versionBeforeHandling = null
    ): void
    {
        echo 'save: ' . $identifiers['uuid'] . PHP_EOL;
        $test = 'Save:' ;
       /* $this->eventStore->appendTo(
            streamName: Core\Aggregate\Product::class, // Stream name
            streamEvents: [
                Ecotone\Modelling\Event::create(
                    $event,
                    metadata: $metadata
                )
            ]
        );*/
    }
}