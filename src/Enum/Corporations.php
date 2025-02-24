<?php

namespace App\Enum;

use App\Service\CarClassifier\RenaultNissanMitsubishiAllianceClassification;
use App\Service\CarClassifier\StellantisClassification;
use App\Service\CarClassifier\VolkswagenGroupClassification;

enum Corporations: string
{
    case RenaultNissanMitsubishiAlliance = RenaultNissanMitsubishiAllianceClassification::class;
    case VolkswagenGroup = volkswagenGroupClassification::class;
    case Stellantis = StellantisClassification::class;

    /**
     * @param string $corporationString
     * @return string
     */
    public static function find(string $corporationString): string
    {
        foreach (self::cases() as $corporation) {
            if ($corporation->name === $corporationString) {
                return $corporation->value;
            }
        }
    }
}
