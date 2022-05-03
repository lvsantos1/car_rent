<?php

namespace App\ValueObjects\StaticDateTime;

interface StaticDateTimeFactoryInterface
{
    public static function createFromTimestamp(int $timestamp): StaticDateTimeInterface;
    public static function createFromPHPNative(\DateTimeInterface $dateTime): StaticDateTimeInterface;
}