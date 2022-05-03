<?php

namespace App\ValueObjects\Year;

class Year implements YearInterface {

    private int $year;

    public function __construct(int $year) {
        if(!$this->isValid($year))
            throw new \InvalidArgumentException('Invalid year');

        $this->year = $year;
    }

    public function isValid(int $year): bool {
        return $year <= (new \DateTimeImmutable())->format('Y') + 1;
    }

    public function __toString(): string
    {
        return (string)$this->year;
    }

    public function jsonSerialize()
    {
        return $this->year;
    }
}