<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Model\Plant\Plant;

interface PlantRepository
{
    /**
     * @param ?array $filters
     * @return Plant[]
     */
    public function findAll(?array $filters = null): array;

    /**
     * @param int $id
     * @return Plant
     * @throws PlantNotFoundException
     */
    public function findPlantOfId(int $id): Plant;

    /**
     * @param int $id
     * @return bool
     * @throws PlantNotFoundException
     */
    public function deletePlant(int $id): bool;

    /**
     * @param array $data
     * @return Plant
     * @throws PlantNotFoundException
     */
    public function createPlant(array $data): Plant;

    /**
     * @param array $data
     * @return bool
     * @throws PlantNotFoundException
     */
    public function updatePlant(int $id, array $data): bool;
}
