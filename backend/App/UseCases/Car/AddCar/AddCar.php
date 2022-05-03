<?php

namespace App\UseCases\Car\AddCar;

class AddCar
{

    public static function execute(AddCarInput $input, AddCarDependencies $dependencies): AddCarOutput
    {

        $car = $dependencies->carFactory->create(
            $dependencies->commomStringFactory->create($dependencies->genericHashGenerator::generate()),
            $dependencies->commomStringFactory->create($input->brand),
            $dependencies->commomStringFactory->create($input->model),
            $dependencies->commomStringFactory->create($input->color),
            $dependencies->yearFactory->create($input->year),
            $dependencies->BRLicensePlateFactory->create($input->licensePlate),
            $dependencies->BRLFactory->create($input->price),
            $dependencies->carStatusFactory->create($input->status),
        );

        $dependencies->carRepository->save($car);

        return new AddCarOutput(
            $car->getEntityId(),
            $car->getBrand(),
            $car->getModel(),
            $car->getColor(),
            (int)(string)$car->getYear(),
            $car->getBRLicensePlate(),
            $car->getPriceByDay(),
            $car->getStatus()->getValue()
        );
    }
}
