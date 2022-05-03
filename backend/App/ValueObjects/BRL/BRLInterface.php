<?php

namespace App\ValueObjects\BRL;

use JsonSerializable;
use Stringable;

interface BRLInterface extends Stringable, JsonSerializable {
    public function sum(BRLInterface $brl): BRLInterface;
    public function subtract(BRLInterface $brl): BRLInterface;
    public function multiply(int $multiplier): BRLInterface;
    public function divide(int $divisor): BRLInterface;
    public function toFloat(): float;
}