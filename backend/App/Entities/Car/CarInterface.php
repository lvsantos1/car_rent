<?php

namespace App\Entities\Car;

use App\ValueObjects\BRL\BRLInterface;
use App\ValueObjects\CarStatus\CarStatusInterface;
use App\ValueObjects\CommomString\CommomStringInterface;
use App\ValueObjects\BRLicensePlate\BRLicensePlateInterface;
use App\ValueObjects\Year\YearInterface;

interface CarInterface {
    public function getEntityId(): CommomStringInterface;
    public function getBrand(): CommomStringInterface;
    public function getModel(): CommomStringInterface;
    public function getColor(): CommomStringInterface;
    public function getYear(): YearInterface;
    public function getBRLicensePlate(): BRLicensePlateInterface;
    public function getPriceByDay(): BRLInterface;
    public function getStatus(): CarStatusInterface;
}