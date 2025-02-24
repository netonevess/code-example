<?php

namespace App\Service\CarClassifier;

use App\Entity\Car;
use App\Enum\Brands;

interface ClassifierRepositoryInterface
{
    /**
     * @param Brands[] $brands
     * @return Car[]
     */
    public function findByBrands(array $brands): array;
}
