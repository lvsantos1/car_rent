<?php

namespace App\UseCases\Car\AddCar;

use App\Application\GenericHashGenerator\GenericHashGeneratorInterface;
use App\Entities\Car\CarFactoryInterface;
use App\Repositories\Car\CarRepositoryInterface;
use App\ValueObjects\BRL\BRLFactoryInterface;
use App\ValueObjects\BRLicensePlate\BRLicensePlateFactoryInterface;
use App\ValueObjects\CarStatus\CarStatusFactoryInterface;
use App\ValueObjects\CommomString\CommomStringFactoryInterface;
use App\ValueObjects\Year\YearFactoryInterface;

class AddCarDependencies {
    public function __construct(
        public readonly CarFactoryInterface $carFactory,
        public readonly CommomStringFactoryInterface $commomStringFactory,
        public readonly BRLFactoryInterface $BRLFactory,
        public readonly BRLicensePlateFactoryInterface $BRLicensePlateFactory,
        public readonly YearFactoryInterface $yearFactory,
        public readonly CarRepositoryInterface $carRepository,
        public readonly GenericHashGeneratorInterface $genericHashGenerator,
        public readonly CarStatusFactoryInterface $carStatusFactory,
    ) {}
}