<?php
namespace App\Service\CarClassifier;

use App\Enum\Brands;
use App\Repository\CarRepository;

abstract class Corporation implements ClassifierInterface
{
    /**
     * @param CarRepository $repository
     */
    public function __construct(
        private readonly ClassifierRepositoryInterface $repository
    ) {
    }

    /**
     * @inheritDoc
     */
    public function classify(): array
    {
        return $this->repository->findByBrands($this->getCorporationBrands());
    }

    /**
     * Must return the Enum\Brands->value[]
     * @return Brands[]
     */
    abstract public static function getCorporationBrands(): array;
}
