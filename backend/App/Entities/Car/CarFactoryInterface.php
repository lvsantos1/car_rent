<?php

namespace App\Entities\Car;

use App\ValueObjects\BRL\BRLInterface;
use App\ValueObjects\CarStatus\CarStatusInterface;
use App\ValueObjects\CommomString\CommomStringInterface;
use App\ValueObjects\BRLicensePlate\BRLicensePlateInterface;
use App\ValueObjects\Year\YearInterface;

interface CarFactoryInterface {
    public static function create(
        CommomStringInterface $entityId,
        CommomStringInterface $brand,
        CommomStringInterface $model,
        CommomStringInterface $color,
        YearInterface $year,
        BRLicensePlateInterface $BRLicensePlate,
        BRLInterface $priceByDay,
        CarStatusInterface $status
    ): CarInterface;
}