<?php

declare(strict_types=1);

namespace App\Application\Controllers\Plant;

use App\Application\Dtos\Plant\FilterPlantDto;
use App\Application\Dtos\Plant\FindPlantDto;
use App\Application\Dtos\Plant\PatchPlantDto;
use App\Application\Dtos\Plant\PlantDto;
use App\Application\Http\Traits\ApiResponseTrait;
use App\Application\UseCase\Plant\CreatePlantUseCase;
use App\Application\UseCase\Plant\DeletePlantUseCase;
use App\Application\UseCase\Plant\FindPlantUseCase;
use App\Application\UseCase\Plant\GetAllPlantUseCase;
use App\Application\UseCase\Plant\UpdatePlantUseCase;
use App\Domain\Repository\PlantRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PlantController
{
    use ApiResponseTrait;

    public function __construct(private readonly PlantRepository $plantRepository) {}

    /**
     * @return mixed
     */
    public function index(Request $request, Response $response)
    {
        $dto = new FilterPlantDto($request->getQueryParams());
        $useCase = new GetAllPlantUseCase($this->plantRepository);
        return $this->successResponse($response, $useCase($dto));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function findById(Request $request, Response $response, array $args)
    {
        $dto = new FindPlantDto($args);
        $useCase = new FindPlantUseCase($this->plantRepository);
        return $this->successResponse($response, $useCase($dto));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function create(Request $request, Response $response)
    {
        $dto = new PlantDto($request->getParsedBody());
        $useCase = new CreatePlantUseCase($this->plantRepository);
        return $this->successResponse($response, $useCase($dto));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function update(Request $request, Response $response, array $args)
    {
        $dto = new PatchPlantDto(array_merge($request->getParsedBody(), $args));
        $useCase = new UpdatePlantUseCase($this->plantRepository);
        return $this->successResponse($response, $useCase($dto));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function delete(Request $request, Response $response, array $args)
    {
        $dto = new FindPlantDto($args);
        $useCase = new DeletePlantUseCase($this->plantRepository);
        return $this->successResponse($response, $useCase($dto));
    }
}
