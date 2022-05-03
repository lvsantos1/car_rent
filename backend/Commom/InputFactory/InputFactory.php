<?php

namespace Commom\InputFactory;

use Commom\InputFactory\Factories\InputFactoryInterface;

class InputFactory {

    public static function create(string $inputClass, array $data = [], array $args = []): object {

        // Verifica se a classe existe
        if (!\class_exists($inputClass))
            throw new InputFactoryException("Class $inputClass not found.");

        // Importa as factories
        $factories = require(__DIR__ . '/factories.php');

        // Verifica se a classe factory existe
        if (!isset($factories[$inputClass]))
            throw new InputFactoryException("Factory for $inputClass not found.");

        // Verifica se a factory tem o metodo create e se o método tem a mesma assinatura
        if(!in_array(InputFactoryInterface::class, class_implements($factories[$inputClass])))
            throw new InputFactoryException("Class $factories[$inputClass] do not implements  " . InputFactoryInterface::class . '.');

        // Instancia a factory e retorna o input
        $factory = new $factories[$inputClass];
        return $factory->create($data, $args);
    }

}