<?php

namespace App\ValueObjects\BRLicensePlate;

interface BRLicensePlateFactoryInterface {
    public static function create(string $BRLicensePlate): BRLicensePlateInterface;
}