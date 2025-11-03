<?php

declare(strict_types=1);

namespace Framework\Controller\Api\V1;

use Domain;
use Ecotone;
use Ecotone\Lite\EcotoneLite;
use Exception;
use Prooph\EventStore\EndPoint;
use Prooph\EventStore\EventData;
use Prooph\EventStore\EventId;
use Prooph\EventStore\ExpectedVersion;
use Prooph\EventStore\StreamMetadata;
use Prooph\EventStoreClient\EventStoreConnectionFactory;
use Ramsey\Uuid\Uuid;
use Symfony;

/**
 * Controller used to manage blog contents in the public part of the site.
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
#[Symfony\Component\HttpKernel\Attribute\AsController]
#[Symfony\Component\Routing\Attribute\Route(path: '/api/v1/product')]
final class ProductController extends Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    /**
     * @param Symfony\Component\Validator\Validator\ValidatorInterface $validator
     * @param Ecotone\Modelling\CommandBus $commandBus
     */
    public function __construct(
        #[Symfony\Component\DependencyInjection\Attribute\Autowire(service: 'validator')]
        private readonly Symfony\Component\Validator\Validator\ValidatorInterface $validator,
        #[Symfony\Component\DependencyInjection\Attribute\Autowire(service: Ecotone\Modelling\CommandBus::class)]
        private readonly Ecotone\Modelling\CommandBus                             $commandBus,
    )
    {
    }

    /**
     * @param Domain\Payload\CreateProductPayload $payload
     * @return Symfony\Component\HttpFoundation\JsonResponse
     */
    #[Symfony\Component\Routing\Attribute\Route(
        path: '/',
        name: 'api_v1_product_create',
        methods: ['POST'],
        format: 'json',
    )]
    public function create(
        #[Symfony\Component\HttpKernel\Attribute\MapRequestPayload(
            acceptFormat: 'json',
            serializationContext: ['...'],
            validationGroups: ['strict', 'read'],
            validationFailedStatusCode: Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND,
        )] Domain\Payload\CreateProductPayload $payload,
    ): Symfony\Component\HttpFoundation\JsonResponse
    {
        $violations = $this->validator->validate(value: $payload);

        if ($violations->count() !== 0) {
            return $this->json(
                data: $violations,
                status: Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST
            );
        }

        $command = new Domain\Command\CreateProductCommand(
            uuid: Uuid::uuid4(),
            name: $payload->name,
            price: $payload->price,
            category: $payload->category,
            attributes: $payload->attributes
        );

        $this->commandBus->sendWithRouting(
            routingKey:  'product.create',
            command: $command
        );

        $this->commandBus->sendWithRouting(
            routingKey:  'product.create_1',
            command: $command
        );

        return $this->json(data: $payload);
    }
}