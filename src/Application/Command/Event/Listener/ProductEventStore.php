<?php

declare(strict_types=1);

namespace Application\Command\Event\Listener;

use Application;
use Domain;
use Ecotone;
use JetBrains;
use Symfony;

/**
 * @final
 * @readonly
 * @class CreateProductListener
 * @implements Domain\Command\Event\Listener\Contract\CommandListenerInterface
 */
final readonly class ProductEventStore implements
    Domain\Command\Event\Listener\Contract\CommandListenerInterface
{
    /**
     *
     * @param Domain\Command\Event\ProductWasCreatedEvent $event
     * @return void
     *
     * @see \Domain\Command\CreateProductCommand
     * @see \Application\Command\Handler\Product\CreateProductCommandHandler
     *
     */
    #[Ecotone\Modelling\Attribute\EventHandler]
    #[JetBrains\PhpStorm\NoReturn]
    public function handle(Domain\Command\Event\ProductWasCreatedEvent $event): void
    {
        echo 'ProductEventStore::handle' .  $event->getUuid()  . PHP_EOL;;
        $test = 1;
    }
}