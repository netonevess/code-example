<?php
namespace Tests\Integration\Repository;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CarRepositoryTest extends KernelTestCase
{
    /**
     * @covers \App\Repository\CarRepository
     * @covers \App\Service\CarClassifier\ClassifierAbstractRepository
     * @return void
     */
    public function testFindBrand(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $repository = $container->get(CarRepository::class);

        $result = $repository->findByBrands(['Audi']);

        // assert amount
        $this->assertCount(4, $result);

        $models = [];
        foreach ($result as $car) {
            // assert all is the same brand
            $this->assertEquals('Audi', $car->getBrand());
            $models[] = $car->getName();
        }

        // assert different items
        $this->assertCount(4, array_unique($models));
    }

    /**
     * @covers \App\Repository\CarRepository
     * @covers \App\Service\CarClassifier\ClassifierAbstractRepository
     * @return void
     */
    public function testFindBrands(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $repository = $container->get(CarRepository::class);

        $result = $repository->findByBrands(['Audi', 'Mercedes-Benz']);

        // assert amount
        $this->assertCount(8, $result);

        $models = [];
        foreach ($result as $car) {
            $models[$car->getBrand()][] = $car->getName();
        }

        // assert array brands found
        $this->assertCount(2, $models);
        // assert found items for each brand
        $this->assertCount(4, $models['Audi']);
        $this->assertCount(4, $models['Mercedes-Benz']);
    }

    /**
     * @covers \App\Repository\CarRepository
     * @covers \App\Service\CarClassifier\ClassifierAbstractRepository
     * @return void
     */
    public function testFindUnknownBrand(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $repository = $container->get(CarRepository::class);

        $result = $repository->findByBrands(['Audi', 'Unknown']);

        // assert amount
        $this->assertCount(4, $result);

        $models = [];
        foreach ($result as $car) {
            // assert all is the same brand
            $this->assertEquals('Audi', $car->getBrand());
            $models[] = $car->getName();
        }

        // assert different items
        $this->assertCount(4, array_unique($models));
    }

    /**
     * @covers \App\Repository\CarRepository
     * @covers \App\Service\CarClassifier\ClassifierAbstractRepository
     * @return void
     */
    public function testFindUnknownOnly(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $repository = $container->get(CarRepository::class);

        $result = $repository->findByBrands(['Unknown']);

        // assert amount
        $this->assertCount(0, $result);
    }
}
