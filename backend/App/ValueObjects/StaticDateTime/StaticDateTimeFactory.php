<?php

namespace App\ValueObjects\StaticDateTime;

class StaticDateTimeFactory implements StaticDateTimeFactoryInterface
{
    public static function createFromTimestamp(int $timestamp): StaticDateTimeInterface
    {
        return new StaticDateTime($timestamp);
    }

    public static function createFromPHPNative(\DateTimeInterface $dateTime): StaticDateTimeInterface
    {
        return new StaticDateTime($dateTime);
    }
}