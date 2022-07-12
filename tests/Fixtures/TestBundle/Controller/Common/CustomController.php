<?php

/*
 * This file is part of the API Platform project.
 *
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace ApiPlatform\Tests\Fixtures\TestBundle\Controller\Common;

use ApiPlatform\Tests\Fixtures\TestBundle\Model\CustomObject;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Custom Controller.
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class CustomController extends AbstractController
{
    public function customAction(int $id): JsonResponse
    {
        return new JsonResponse(sprintf('This is a custom action for %d.', $id), 200, ['Content-Type' => 'application/ld+json; charset=utf-8']);
    }

    /**
     * Custom route for a non API Platform route.
     *
     * @Route(methods={"GET"}, name="custom_external_route", path="/common/custom/object")
     */
    public function __invoke(): CustomObject
    {
        return new CustomObject(1, 'Lorem ipsum dolor sit amet');
    }
}
