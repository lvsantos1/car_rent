<?php

namespace App\Application\GenericHashGenerator;

interface GenericHashGeneratorInterface
{
    public static function generate(): string;
}