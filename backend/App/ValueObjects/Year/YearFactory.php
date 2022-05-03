<?php

namespace App\ValueObjects\Year;

class YearFactory implements YearFactoryInterface {
    public static function create(int $value): Year {
        return new Year($value);
    }
}