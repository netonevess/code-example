<?php

namespace App\Service\CarClassifier;

use App\Enum\Brands;

class StellantisClassification extends Corporation
{
    private const array BRANDS = [
        Brands::Chrysler,
        Brands::Citroen,
    ];

    /**
     * @inheritDoc
     */
    public static function getCorporationBrands(): array
    {
        return self::BRANDS;
    }
}
