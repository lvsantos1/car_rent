<?php

namespace App\ValueObjects\Year;

interface YearFactoryInterface {
    public static function create(int $value): YearInterface;
}