<?php

require '../vendor/autoload.php';

use Slim\Endpoints\AddCarEndpoint;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->post('/', AddCarEndpoint::class);

$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->run();