<?php

declare(strict_types=1);

namespace Domain\Payload;

use Symfony;

/**
 * @class CreateProductPayload
 *
 * @property string name
 * @property float price
 * @property float category
 * @property array attributes
 */
#[Symfony\Component\Validator\Constraints\Cascade]
final class CreateProductPayload
{
    #[Symfony\Component\Validator\Constraints\NotBlank]
    #[Symfony\Component\Validator\Constraints\Type(type: 'string')]
    public string $name;

    #[Symfony\Component\Validator\Constraints\NotBlank]
    #[Symfony\Component\Validator\Constraints\Type(type: 'float')]
    public float $price;

    #[Symfony\Component\Validator\Constraints\NotBlank]
    #[Symfony\Component\Validator\Constraints\Type(type: 'string')]
    public string $category;

    #[Symfony\Component\Validator\Constraints\NotBlank]
    #[Symfony\Component\Validator\Constraints\Type(type: 'array')]
    public array $attributes;
}