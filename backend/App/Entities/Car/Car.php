<?php

namespace App\Entities\Car;

use App\ValueObjects\BRL\BRL;
use App\ValueObjects\BRLicensePlate\BRLicensePlate;
use App\ValueObjects\CarStatus\CarStatus;
use App\ValueObjects\CommomString\CommomString;
use App\ValueObjects\Year\Year;

class Car implements CarInterface {
    public function __construct(
        private CommomString $entityId,
        private CommomString $brand,
        private CommomString $model,
        private CommomString $color,
        private Year $year,
        private BRLicensePlate $BRLicensePlate,
        private BRL $priceByDay,
        private CarStatus $status
    ) {}

    public function getEntityId(): CommomString {
        return $this->entityId;
    }

    public function getBrand(): CommomString {
        return $this->brand;
    }

    public function getModel(): CommomString {
        return $this->model;
    }

    public function getColor(): CommomString {
        return $this->color;
    }

    public function getYear(): Year {
        return $this->year;
    }

    public function getBRLicensePlate(): BRLicensePlate {
        return $this->BRLicensePlate;
    }

    public function getPriceByDay(): BRL {
        return $this->priceByDay;
    }

    public function getStatus(): CarStatus {
        return $this->status;
    }
}