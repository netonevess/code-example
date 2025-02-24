<?php

namespace App\Service\CarClassifier;

use App\Enum\Brands;

class RenaultNissanMitsubishiAllianceClassification extends Corporation
{
    private const array BRANDS = [
        Brands::Nissan,
    ];

    /**
     * @inheritDoc
     */
    public static function getCorporationBrands(): array
    {
        return self::BRANDS;
    }
}
