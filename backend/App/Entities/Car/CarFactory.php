<?php

namespace App\Entities\Car;

use App\ValueObjects\BRL\BRL;
use App\ValueObjects\BRL\BRLInterface;
use App\ValueObjects\BRLicensePlate\BRLicensePlate;
use App\ValueObjects\BRLicensePlate\BRLicensePlateInterface;
use App\ValueObjects\CarStatus\CarStatus;
use App\ValueObjects\CarStatus\CarStatusInterface;
use App\ValueObjects\CommomString\CommomString;
use App\ValueObjects\CommomString\CommomStringInterface;
use App\ValueObjects\Year\Year;
use App\ValueObjects\Year\YearInterface;

class CarFactory implements CarFactoryInterface {

    public static function create(
        CommomStringInterface $entityId,
        CommomStringInterface $brand,
        CommomStringInterface $model,
        CommomStringInterface $color,
        YearInterface $year,
        BRLicensePlateInterface $BRLicensePlate,
        BRLInterface $priceByDay,
        CarStatusInterface $status
    ): CarInterface {
        return new Car(
            $entityId,
            $brand,
            $model,
            $color,
            $year,
            $BRLicensePlate,
            $priceByDay,
            $status
        );
    }

    /*public static function create(
        CommomString $entityId,
        CommomString $brand,
        CommomString $model,
        CommomString $color,
        Year $year,
        BRLicensePlate $BRLicensePlate,
        BRL $priceByDay,
        CarStatus $status
    ): Car {
        return new Car(
            $entityId,
            $brand,
            $model,
            $color,
            $year,
            $BRLicensePlate,
            $priceByDay,
            $status
        );
    }*/
}