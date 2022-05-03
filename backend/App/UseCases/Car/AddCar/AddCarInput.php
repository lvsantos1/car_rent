<?php

namespace App\UseCases\Car\AddCar;

class AddCarInput {
    public function __construct(
        public readonly string $brand,
        public readonly string $model,
        public readonly string $color,
        public readonly int $year,
        public readonly string $licensePlate,
        public readonly float $price,
        public readonly string $status,
    ) {}
}