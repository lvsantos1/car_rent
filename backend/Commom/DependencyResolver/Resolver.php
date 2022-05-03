<?php

/**
 * Esta classe é responsável por identificar as dependências de um input e encontrar implementações
 * das interfaces contidas nele.
 */

namespace Commom\DependencyResolver;

class Resolver
{

    //private array $implementations;

    /*public function __construct()
    {
        $this->implementations = require __DIR__ . '/implementations.php';
    }*/

    public static function resolve(string $dependenceClass, array $overwriteStandards = []): object
    {

        // Verifica se a classe existe
        if (!\class_exists($dependenceClass))
            throw new ResolverException("Class $dependenceClass not found");

        // Cria um objeto de reflexão na classe de dependência
        $dependenceReflectionClass = new \ReflectionClass($dependenceClass);

        // Cria um objeto de reflexão na classe de implementação
        $dependenceInstance = $dependenceReflectionClass->newInstanceWithoutConstructor();

        /* Monta a array com as implementaçÕes disponíveis
        * (implementações do arquivos implementations.php + sobrescritas/adicionadas)
        */
        $implementations = require __DIR__ . '/implementations.php';
        $implementations = \array_replace($implementations, $overwriteStandards);

        // Percorre o construtor da classe da dependência e verifica se existe uma implementação disponível
        $findedImplementations = [];
        foreach ($dependenceReflectionClass->getProperties() as $property) {

            // Verifica se existe uma implementação para a classe de dependência
            if (!isset($implementations[$property->getType()->getName()]))
                throw new ResolverException(
                    $property->getType()->getName() . ' has not a available implementation.'
                );

            /**
             * 
             * Verifica se a implementação é uma instância da classe de dependência
             * 
             * OBS: Esta condição pode ser removida posteriormente já que o PHP já verifica se a classe
             * implementa a interface. Atualmente, o benifício dessa condição é a possibilidade de termos
             * erros mais legíveis quando a classe de dependência não implementa a interface. O contra
             * é a dupla verificação de implementação (Esta condição + PHP).
             * 
             */
            $classImplements = \class_implements($implementations[$property->getType()->getName()]);
            $classImplements = $classImplements === false ? [] : $classImplements;
            if (!in_array($property->getType()->getName(), $classImplements))
                throw new ResolverException(
                    $implementations[$property->getType()->getName()] . ' is not a instance of ' . $property->getType()->getName() . '.'
                );

            $property->setValue($dependenceInstance, new $implementations[$property->getType()->getName()]);
        }

        // Cria um objeto com os parâmetros da classe de dependência
        return $dependenceInstance;
    }
}
