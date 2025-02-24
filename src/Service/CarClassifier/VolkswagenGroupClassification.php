<?php

namespace App\Service\CarClassifier;

use App\Enum\Brands;

class VolkswagenGroupClassification extends Corporation
{
    private const array BRANDS = [
        Brands::Volkswagen,
        Brands::Audi,
        Brands::Porsche
    ];

    /**
     * @inheritDoc
     */
    public static function getCorporationBrands(): array
    {
        return self::BRANDS;
    }
}
