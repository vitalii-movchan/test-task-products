<?php

declare(strict_types=1);

namespace Application\Command\Handler\Product;

use Core\Aggregate\Product;
use Domain;
use Ecotone;
use JetBrains;
use Ramsey\Uuid\Uuid;
use Symfony;

/**
 * @see https://symfony.com/doc/current/messenger.html#creating-a-message-handler
 *
 * @class CreateProductCommandHandler
 * @implements Domain\Command\Handler\Contract\CommandHandlerInterface
 */
final class CreateProductCommandHandler implements
    Domain\Command\Handler\Contract\CommandHandlerInterface
{
    /**
     * @param Ecotone\Modelling\EventBus $eventBus
     */
    public function __construct(
        #[Symfony\Component\DependencyInjection\Attribute\Autowire(service: Ecotone\Modelling\EventBus::class)]
        private readonly Ecotone\Modelling\EventBus $eventBus,
    )
    {
    }

    /**
     * @param Domain\Command\CreateProductCommand $command
     * @return void
     */
   // #[Ecotone\Modelling\Attribute\CommandHandler]
  /*  #[JetBrains\PhpStorm\NoReturn]
    public function register(
        #[Ecotone\Messaging\Attribute\Parameter\Payload] Domain\Command\CreateProductCommand $command
    ): void
    {
        //$this->id = 1;
       // echo 'test-45';

        $this->eventBus->publish(
            event: new Domain\Command\Event\EventSourcing\CreateProductEvent(
                name: $command->getName(),
                price: $command->getPrice(),
                category: $command->getCategory(),
                attributes: $command->getAttributes(),
            )
        );
    }*/
}