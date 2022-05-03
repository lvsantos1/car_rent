<?php

namespace App\ValueObjects\BRLicensePlate;

class BRLicensePlateFactory implements BRLicensePlateFactoryInterface
{
    public static function create(string $licensePlate): BRLicensePlateInterface
    {
        return new BRLicensePlate($licensePlate);
    }
}	