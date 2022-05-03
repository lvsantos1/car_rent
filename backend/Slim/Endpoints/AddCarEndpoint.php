<?php

namespace Slim\Endpoints;

use App\UseCases\Car\AddCar\AddCar;
use App\UseCases\Car\AddCar\AddCarDependencies;
use App\UseCases\Car\AddCar\AddCarInput;
use Commom\DependencyResolver\Resolver;
use Commom\InputFactory\InputFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\NullLogger;

class AddCarEndpoint
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = [])
    {
        $input = InputFactory::create(AddCarInput::class, $request->getParsedBody() ?? [], $args);
        $dependencies = Resolver::resolve(AddCarDependencies::class);

        $useCaseOutput = AddCar::execute($input, $dependencies);

        $response->getBody()->write(json_encode($useCaseOutput));

        return $response;
    }
}