<?php

namespace App\Service\CarClassifier;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

abstract class ClassifierAbstractRepository extends ServiceEntityRepository implements ClassifierRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function findByBrands($brands): array
    {
        return $this->findBy(['brand' => $brands]);
    }
}
