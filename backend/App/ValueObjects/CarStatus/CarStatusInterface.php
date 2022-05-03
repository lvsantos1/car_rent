<?php

namespace App\ValueObjects\CarStatus;

use JsonSerializable;

interface CarStatusInterface extends JsonSerializable {
    public function getValue(): string;
}