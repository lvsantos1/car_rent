<?php
namespace App\Repositories\Car;

use App\Entities\Car\CarInterface;

class MongoDBCarRepository implements CarRepositoryInterface {
    public function save(CarInterface $car) : bool {

        try {
            $mongo = new \MongoDB\Client("mongodb://root:root@car_rent_mongodb:27017");
            $collection = $mongo->car_rent->car;
            $collection->insertOne($this->toMongoDB($car));
        } catch (\Exception $e) {

            echo PHP_EOL . PHP_EOL . $e->getMessage() . PHP_EOL . PHP_EOL;

            return false;
        }

        return true;
    }

    private function toMongoDB(CarInterface $car) : array {
        return [
            '_id' => new \MongoDB\BSON\ObjectId((string)$car->getEntityId()),
            'brand' => (string)$car->getBrand(),
            'model' => (string)$car->getModel(),
            'color' => (string)$car->getColor(),
            'year' => (int)(string)$car->getYear(),
            'license_plate' => (string)$car->getBRLicensePlate(),
            'price' => (string)$car->getPriceByDay(),
            'status' => $car->getStatus()->getValue(),
        ];
    }
}