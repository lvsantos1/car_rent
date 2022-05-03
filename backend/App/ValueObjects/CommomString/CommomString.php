<?php

namespace App\ValueObjects\CommomString;

class CommomString implements CommomStringInterface
{
    private string $string;

    public function __construct(string $string)
    {
        $this->string = $string;
    }

    public function __toString(): string
    {
        return $this->string;
    }

    public function jsonSerialize(): mixed
    {
        return $this->string;
    }
}