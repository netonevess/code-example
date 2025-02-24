<?php
namespace Test\Unit\Service\CarClassifier;

use App\Repository\CarRepository;
use App\Service\CarClassifier\StellantisClassification;
use PHPUnit\Framework\TestCase;

class StellantisClassificationTest extends TestCase
{
    /**
     * @covers \App\Service\CarClassifier\StellantisClassification
     * @covers \App\Service\CarClassifier\Corporation
     * @return void
     */
    public function testClassification(): void
    {
        $repository = $this->createMock(CarRepository::class);
        $repository
            ->expects($this->once())
            ->method('findByBrands')
            ->willReturn(['test']);

        $service = new StellantisClassification($repository);
        $result = $service->classify();
        $this->assertEquals('test', $result[0]);
    }
}
