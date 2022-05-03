<?php

use App\Application\GenericHashGenerator\GenericHashGeneratorInterface;
use App\Application\GenericHashGenerator\MongoDBIDGenerator;
use App\Entities\Car\Car;
use App\Entities\Car\CarFactory;
use App\Entities\Car\CarFactoryInterface;
use App\Repositories\Car\CarRepositoryInterface;
use App\Repositories\Car\MongoDBCarRepository;
use App\ValueObjects\BRL\BRL;
use App\ValueObjects\BRL\BRLFactory;
use App\ValueObjects\BRL\BRLFactoryInterface;
use App\ValueObjects\BRL\BRLInterface;
use App\ValueObjects\BRLicensePlate\BRLicensePlate;
use App\ValueObjects\BRLicensePlate\BRLicensePlateFactory;
use App\ValueObjects\BRLicensePlate\BRLicensePlateFactoryInterface;
use App\ValueObjects\BRLicensePlate\BRLicensePlateInterface;
use App\ValueObjects\CarStatus\CarStatus;
use App\ValueObjects\CarStatus\CarStatusFactory;
use App\ValueObjects\CarStatus\CarStatusFactoryInterface;
use App\ValueObjects\CarStatus\CarStatusInterface;
use App\ValueObjects\CommomString\CommomString;
use App\ValueObjects\CommomString\CommomStringFactory;
use App\ValueObjects\CommomString\CommomStringFactoryInterface;
use App\ValueObjects\CommomString\CommomStringInterface;
use App\ValueObjects\Year\Year;
use App\ValueObjects\Year\YearFactory;
use App\ValueObjects\Year\YearFactoryInterface;
use App\ValueObjects\Year\YearInterface;

return [

    /** Entities */
    CarInterface::class => Car::class,
    CarFactoryInterface::class => CarFactory::class,
    /** End Entities */

    /** Value Objects */
    BRLInterface::class => BRL::class,
    BRLFactoryInterface::class => BRLFactory::class,

    BRLicensePlateInterface::class => BRLicensePlate::class,
    BRLicensePlateFactoryInterface::class => BRLicensePlateFactory::class,

    CarStatusInterface::class => CarStatus::class,
    CarStatusFactoryInterface::class => CarStatusFactory::class,

    CommomStringInterface::class => CommomString::class,
    CommomStringFactoryInterface::class => CommomStringFactory::class,

    YearInterface::class => Year::class,
    YearFactoryInterface::class => YearFactory::class,
    /** End Value Objects */

    /** Repositories */
    CarRepositoryInterface::class => MongoDBCarRepository::class,
    /** End Repositories */

    /** Application */
    GenericHashGeneratorInterface::class => MongoDBIDGenerator::class,
    /** ENd Application */
];