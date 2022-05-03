<?php

namespace Commom\InputFactory\Factories;

interface InputFactoryInterface
{
    public function create(array $data, array $args = []): object;
}