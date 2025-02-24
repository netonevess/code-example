<?php

namespace App\Controller;

use App\Repository\CarRepository;
use App\Service\CarClassifier\JapanCountryClassification;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class Country extends AbstractApi
{
    /**
     * @param CarRepository $repository
     * @param Request $request
     * @return JsonResponse
     * @api
     */
    #[Route('/country', name: 'corporation', methods: ['GET'])]
    public function getCorporation(
        CarRepository $repository,
        Request $request,
    ): JsonResponse {
        $this->logger->info('Access', ['request' => $request]);

        /**
         * @todo missing validation and stuff to make it switchable
         */
        $chosenCountry = new JapanCountryClassification($repository);
        return $this->json($chosenCountry->classify());
    }
}
