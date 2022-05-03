<?php

namespace App\UseCases\Car\AddCar;

class AddCarOutput {
    public function __construct(
        public readonly string $id,
        public readonly string $brand,
        public readonly string $model,
        public readonly string $color,
        public readonly int $year,
        public readonly string $license_plate,
        public readonly string $price,
        public readonly string $status,
    ){}
}