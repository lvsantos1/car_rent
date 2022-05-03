<?php

namespace App\ValueObjects\CommomString;

class CommomStringFactory implements CommomStringFactoryInterface
{
    public static function create(string $value): CommomString
    {
        return new CommomString($value);
    }
}