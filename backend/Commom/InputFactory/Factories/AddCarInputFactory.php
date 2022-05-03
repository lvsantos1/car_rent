<?php

namespace Commom\InputFactory\Factories;

use App\UseCases\Car\AddCar\AddCarInput;

class AddCarInputFactory implements InputFactoryInterface {

    public function create(array $data, array $args = []): AddCarInput {
        return new AddCarInput(
            $data['brand'],
            $data['model'],
            $data['color'],
            $data['year'],
            $data['license_plate'],
            $data['price'],
            $data['status'],
        );
    }

}