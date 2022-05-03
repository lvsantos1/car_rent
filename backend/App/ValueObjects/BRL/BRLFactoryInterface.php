<?php

namespace App\ValueObjects\BRL;

interface BRLFactoryInterface {
    public static function create(int|string|float $brl): BRLInterface;
}