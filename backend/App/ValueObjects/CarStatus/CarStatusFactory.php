<?php

namespace App\ValueObjects\CarStatus;

class CarStatusFactory implements CarStatusFactoryInterface
{

    public static function create(string $value): CarStatusInterface
    {
        return match ($value) {
            'available'   => CarStatus::AVAILABLE,
            'reserved'    => CarStatus::RESERVED,
            'in_use'      => CarStatus::IN_USE,
            'broken'      => CarStatus::BROKEN,
            'deleted'     => CarStatus::DELETED,
            'maintenance' => CarStatus::MAINTENANCE,
        };
    }
}
