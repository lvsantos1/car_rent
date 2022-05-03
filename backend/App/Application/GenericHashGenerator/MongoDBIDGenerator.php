<?php

namespace App\Application\GenericHashGenerator;

use App\Application\GenericHashGenerator\GenericHashGeneratorInterface;

class MongoDBIDGenerator implements GenericHashGeneratorInterface
{
    public static function generate(): string
    {
        return (string)(new \MongoDB\BSON\ObjectId());
    }
}
