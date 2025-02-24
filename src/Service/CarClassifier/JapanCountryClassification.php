<?php

namespace App\Service\CarClassifier;

use App\Enum\Corporations;

class JapanCountryClassification extends Country
{
    /**
     * @var Corporations[]
     */
    private const array CORPORATIONS = [
        Corporations::RenaultNissanMitsubishiAlliance
    ];

    /**
     * @inheritDoc
     */
    public static function getCountryBrands(): array
    {
        $result = [];
        foreach (self::CORPORATIONS as $corporation) {
            $classification = $corporation->value;
            $result = [...$result, ...$classification::getCorporationBrands()];
        }
        return $result;
    }
}
