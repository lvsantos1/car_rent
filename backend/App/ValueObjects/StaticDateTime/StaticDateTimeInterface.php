<?php

namespace App\ValueObjects\StaticDateTime;

use Stringable;
use JsonSerializable;

interface StaticDateTimeInterface extends Stringable, JsonSerializable {
    public function getTimestamp(): int;
    public function toPHPNative(): \DateTimeInterface;
}