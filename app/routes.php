<?php

declare(strict_types=1);

use App\Application\Controllers\Plant\PlantController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hola Campers!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', [PlantController::class, 'index']);
        $group->get('/{id}', [PlantController::class, 'findById']);
        $group->post('', [PlantController::class, 'create']);
        $group->put('/{id}', [PlantController::class, 'update']);
        $group->delete('/{id}', [PlantController::class, 'delete']);
    });

    //Agregar las rutas aquí abajo.
};
