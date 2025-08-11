<?php

namespace App\Application\UseCase\Plant;

use App\Application\Dtos\Contracts\ArraySerializableDto;
use App\Application\UseCase\Contracts\ActionUseCase;
use App\Domain\Repository\PlantRepository;

class GetAllPlantUseCase implements ActionUseCase
{
    public function __construct(private readonly PlantRepository $repository) {}

    /**
     * @param ?ArraySerializableDto $dto
     * @return mixed
     */
    public function __invoke(?ArraySerializableDto $dto = null)
    {
        return $this->repository->findAll($dto->toArray());
    }
}
