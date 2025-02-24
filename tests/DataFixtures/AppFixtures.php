<?php

namespace App\Tests\DataFixtures;

use App\Entity\Car;
use App\Enum\Brands;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private const array CAR_MODELS = [
        Brands::Ford->value => ['Mustang', 'F-150', 'Explorer', 'Focus'],
        Brands::Chevrolet->value => ['Camaro', 'Silverado', 'Equinox', 'Cruze'],
        Brands::Volkswagen->value => ['Golf', 'Jetta', 'Tiguan', 'Polo'],
        Brands::Toyota->value => ['Corolla', 'Camry', 'RAV4', 'Hilux'],
        Brands::Honda->value => ['Civic', 'CR-V', 'Accord', 'Fit'],
        Brands::Hyundai->value => ['Elantra', 'Tucson', 'Sonata', 'HB20'],
        Brands::Nissan->value => ['Sentra', 'Rogue', 'Altima', 'Kicks'],
        Brands::BMW->value => ['Série 3', 'X5', 'Série 5', 'M3'],
        Brands::MercedesBenz->value => ['Classe C', 'Classe E', 'GLC', 'Classe A'],
        Brands::Audi->value => ['A3', 'A4', 'Q5', 'TT'],
        Brands::Porsche->value => ['911', 'Cayenne', 'Macan', 'Taycan'],
        Brands::Chrysler->value => ['300', 'Pacifica', 'Voyager'],
        Brands::Citroen->value => ['C3', 'C4 Cactus', 'C5 Aircross', 'DS3']
    ];

    /**
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        foreach (Brands::cases() as $brand) {
            $models = self::CAR_MODELS[$brand->value];
            foreach ($models as $model) {
                $car = new Car();
                $car->setName($model);
                $car->setBrand($brand->value);
                $manager->persist($car);
            }
        }

        $manager->flush();
    }
}
