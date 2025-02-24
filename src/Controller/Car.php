<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class Car extends AbstractApi
{
    /**
     * @param CarRepository $repository
     * @param Request $request
     * @return JsonResponse
     * @api
     */
    #[Route('/cars', name: 'cars', methods: ['GET'])]
    public function getCars(
        CarRepository $repository,
        Request $request,
    ): JsonResponse {
        $this->logger->info('Access', ['request' => $request]);
        return $this->json($repository->findAll());
    }
}
