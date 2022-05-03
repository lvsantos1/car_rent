<?php

namespace App\ValueObjects\CarStatus;

enum CarStatus implements CarStatusInterface {

    case AVAILABLE;
    case RESERVED;
    case IN_USE;
    case BROKEN;
    case DELETED;
    case MAINTENANCE;

    public function getValue(): string {
        return match($this) {
            CarStatus::AVAILABLE   => 'available',
            CarStatus::RESERVED    => 'reserved',
            CarStatus::IN_USE      => 'in_use',
            CarStatus::BROKEN      => 'broken',
            CarStatus::DELETED     => 'deleted',
            CarStatus::MAINTENANCE => 'maintenance',
        };
    }

    public function jsonSerialize(): mixed
    {
        return $this->getValue();
    }
}