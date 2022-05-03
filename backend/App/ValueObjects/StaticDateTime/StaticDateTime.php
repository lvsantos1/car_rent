<?php

namespace App\ValueObjects\StaticDateTime;

class StaticDateTime implements StaticDateTimeInterface {
    private \DateTimeInterface $dateTime;

    public function __construct(\DateTimeInterface|int $dateTime)
    {
        if($dateTime instanceof \DateTimeInterface) {
            $this->dateTime = $dateTime;
        } else {
            $this->dateTime = new \DateTimeImmutable();
            $this->dateTime->setTimestamp($dateTime);
        }
    }

    public function getTimestamp(): int
    {
        return $this->dateTime->getTimestamp();
    }

    public function toPHPNative(): \DateTimeInterface
    {
        return $this->dateTime;
    }

    private function createFromPHPNative(\DateTimeInterface $dateTime): StaticDateTimeInterface
    {
        return new StaticDateTime($dateTime);
    }

    public function __toString(): string
    {
        return $this->dateTime->format('Y-m-d H:i:s');
    }

    public function jsonSerialize(): mixed
    {
        return $this->dateTime->format('Y-m-d H:i:s');
    }
}