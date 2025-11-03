<?php

declare(strict_types=1);

namespace Core\Aggregate;

use Core;
use Domain;
use Ecotone;
use Ecotone\Messaging\MessagingException;
use Ecotone\Modelling\AggregateMessage;
use Ramsey;
use Symfony;

#[Ecotone\Modelling\Attribute\Aggregate]
final class Product implements
    Core\Aggregate\Contract\AggregateInterface
{
    use Ecotone\Modelling\WithAggregateVersioning;
    use Ecotone\Modelling\WithAggregateEvents;

    #[Ecotone\Modelling\Attribute\Identifier]
    #[Symfony\Component\Validator\Constraints\NotBlank]
    #[Symfony\Component\Validator\Constraints\Type(type: 'string')]
    public Ramsey\Uuid\UuidInterface $uuid;

    #[Symfony\Component\Validator\Constraints\NotBlank]
    #[Symfony\Component\Validator\Constraints\Type(type: 'string')]
    private string $name;

    #[Symfony\Component\Validator\Constraints\NotBlank]
    #[Symfony\Component\Validator\Constraints\Type(type: 'float')]
    private float $price;

    #[Symfony\Component\Validator\Constraints\NotBlank]
    #[Symfony\Component\Validator\Constraints\Type(type: 'string')]
    private string $category;

    #[Symfony\Component\Validator\Constraints\NotBlank]
    #[Symfony\Component\Validator\Constraints\Type(type: 'array')]
    private array $attributes;

    /**
     * @param Domain\Command\CreateProductCommand $command
     * @return void
     */
    #[Ecotone\Modelling\Attribute\CommandHandler(routingKey: 'product.create')]
    public function create(
        #[Ecotone\Messaging\Attribute\Parameter\Payload] Domain\Command\CreateProductCommand $command,
    ): void
    {
        $test = 1;
        echo 'Product::create_1:' . $command->getUuid()->toString() . PHP_EOL;

        $this->uuid = $command->getUuid();
        $this->name = $command->getName();
        $this->price = $command->getPrice();
        $this->category = $command->getCategory();
        $this->attributes = $command->getAttributes();

        $this->recordThat(
            event: new Domain\Command\Event\ProductWasCreatedEvent(
                uuid: $command->getUuid(),
                name: $command->getName(),
                price: $command->getPrice(),
                category: $command->getCategory(),
                attributes: $command->getAttributes(),
            )
        );
    }

    #[Ecotone\Modelling\Attribute\CommandHandler(routingKey: 'product.create_1')]
    public function create_1(
        #[Ecotone\Messaging\Attribute\Parameter\Payload] Domain\Command\CreateProductCommand $command,
    ): void
    {
        $test = 2;
        echo 'Product::create_2:' . $command->getUuid()->toString() . PHP_EOL;

        $this->uuid = $command->getUuid();
        $this->name = $command->getName();
        $this->price = $command->getPrice();
        $this->category = $command->getCategory();
        $this->attributes = $command->getAttributes();

        $this->recordThat(
            event: new Domain\Command\Event\ProductWasCreatedEvent(
                uuid: $command->getUuid(),
                name: $command->getName(),
                price: $command->getPrice(),
                category: $command->getCategory(),
                attributes: $command->getAttributes(),
            )
        );
    }

    #[Ecotone\Modelling\Attribute\EventSourcingHandler]
    public function apply(Domain\Command\Event\ProductWasCreatedEvent $command): void
    {
        echo 'test_12';
    }
}