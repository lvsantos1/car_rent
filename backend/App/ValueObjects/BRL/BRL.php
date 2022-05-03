<?php

namespace App\ValueObjects\BRL;

use App\ValueObjects\InvalidValueException;

class BRL implements BRLInterface
{
    private float $value;

    public function __construct(int|float|string $value)
    {
        $type = gettype($value) == "double" ? "float" : gettype($value);
        $method = 'buildFrom' . $type;
        $this->{$method}($value);
    }

    public function sum(BRLInterface $brl): BRLInterface
    {
        return new BRL($this->value + $brl->toFloat());
    }

    public function subtract(BRLInterface $brl): BRLInterface
    {
        return new BRL($this->value - $brl->toFloat());
    }

    public function multiply(int|float $multiplier): BRLInterface
    {
        return new BRL(bcmul($this->value, $multiplier, 20));
    }

    public function divide(int $divisor): BRLInterface
    {
        return new BRL(bcdiv($this->value, $divisor, 20));
    }

    public function toFloat(): float
    {
        return $this->value;
    }

    private function buildFromInteger(int $value): void
    {
        $this->value = (float)$value;
    }

    private function buildFromFloat(float $value): void
    {
        $this->value = $value;
    }

    private function buildFromString(string $value): void
    {
        if(!preg_match('/^([0-9]+|[0-9]{1,3}(\.[0-9]{3})*?)(,[0-9]{1,2})?$/', $value)) {
            throw new InvalidValueException('Invalid value for BRL: ' . $value . '.');
        }

        $value = str_replace('.', '', $value);
        $value = str_replace(',', '.', $value);

        $this->value = (float)$value;
    }

    public function jsonSerialize(): mixed
    {
        return (string)$this->value;
    }

    public function __toString(): string
    {
        return 'R$' . \number_format($this->value, 2, ',', '.');
    }
}
