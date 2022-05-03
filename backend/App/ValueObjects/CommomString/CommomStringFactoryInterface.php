<?php

namespace App\ValueObjects\CommomString;

use JsonSerializable;
use Stringable;

interface CommomStringFactoryInterface {
    public static function create(string $value): CommomStringInterface;
}