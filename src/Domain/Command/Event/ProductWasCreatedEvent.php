<?php

declare(strict_types=1);

namespace Domain\Command\Event;

use Application;
use Domain;
use Ecotone;
use Ramsey;
use Symfony;

/**
 * @see \Application\Command\Event\Listener\CreateProductListener
 *
 * @final
 * @class CreateProductEvent
 * @extends Symfony\Contracts\EventDispatcher\Event
 * @implements Domain\Command\Event\Contract\CommandEventInterface
 */
final readonly class ProductWasCreatedEvent implements
    Domain\Command\Event\Contract\CommandEventInterface
{
    #[Ecotone\Modelling\Attribute\TargetIdentifier('uuid')]
    #[Symfony\Component\Validator\Constraints\NotBlank]
    #[Symfony\Component\Validator\Constraints\Type(type: 'uuid')]
    private Ramsey\Uuid\UuidInterface $uuid;

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
     * @param string $name Product name
     * @param float $price Product price
     * @param string $category Product category
     * @param array $attributes Product attributes
     */
    public function __construct(
        Ramsey\Uuid\UuidInterface $uuid,
        string                    $name,
        float                     $price,
        string                    $category,
        array                     $attributes
    )
    {
        $this->uuid = $uuid;

        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->attributes = $attributes;
    }

    /**
     * @return Ramsey\Uuid\UuidInterface
     */
    public function getUuid(): Ramsey\Uuid\UuidInterface
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
}