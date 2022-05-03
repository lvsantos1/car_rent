<?php

use App\UseCases\Car\AddCar\AddCarInput;
use Commom\InputFactory\Factories\AddCarInputFactory;

return [
    AddCarInput::class => AddCarInputFactory::class,
];