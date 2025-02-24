<?php

namespace App\Service\CarClassifier;

use App\Entity\Car;

interface ClassifierInterface
{
    /**
     * @return Car[]
     */
    public function classify(): array;
}
