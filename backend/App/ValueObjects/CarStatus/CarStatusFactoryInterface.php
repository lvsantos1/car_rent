<?php

namespace App\ValueObjects\CarStatus;

interface CarStatusFactoryInterface {
    public static function create(string $value): CarStatusInterface;
}