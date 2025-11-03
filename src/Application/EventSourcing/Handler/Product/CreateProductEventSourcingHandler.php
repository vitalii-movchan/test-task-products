<?php
declare(strict_types=1);

namespace Application\EventSourcing\Handler\Product;

use Domain;
use Ecotone;

//#[Ecotone\Modelling\Attribute\EventSourcingAggregate]
class CreateProductEventSourcingHandler
{
   // #[Ecotone\Modelling\Attribute\EventSourcingHandler]
    public function apply(Domain\Command\Event\ProductWasCreatedEvent $command): void
    {
        echo 'tester_1';
    }
}