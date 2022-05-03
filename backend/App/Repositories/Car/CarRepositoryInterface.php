<?php

namespace App\Repositories\Car;

use App\Entities\Car\CarInterface;

interface CarRepositoryInterface {
    public function save(CarInterface $car): bool;
}