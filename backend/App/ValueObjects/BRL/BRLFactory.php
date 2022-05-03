<?php

namespace App\ValueObjects\BRL;

class BRLFactory implements BRLFactoryInterface {

    public static function create(int|string|float $brl): BRLInterface {
        return new BRL($brl);
    }

}