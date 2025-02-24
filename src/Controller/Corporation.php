<?php

namespace App\Controller;

use App\Enum\Corporations;
use App\Repository\CarRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Corporation extends AbstractApi
{
    /**
     * @param CarRepository $repository
     * @param Request $request
     * @return JsonResponse
     * @api
     */
    #[Route('/corporation', name: 'corporation', methods: ['GET'])]
    public function getCorporation(
        CarRepository $repository,
        Request $request,
    ): JsonResponse {
        $this->logger->info('Access', ['request' => $request]);

        $corporationRequest = $request->query->get('corporation');
        if (array_key_exists($corporationRequest, Corporations::cases()) === null) {
            return $this->json(['message' => 'Corporation not found'], Response::HTTP_NOT_FOUND);
        }

        $classifierClass = Corporations::find($corporationRequest);
        $classifier = new $classifierClass($repository);

        return $this->json($classifier->classify());
    }
}
