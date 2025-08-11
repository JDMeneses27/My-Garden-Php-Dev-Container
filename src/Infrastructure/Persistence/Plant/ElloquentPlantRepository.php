<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Plant;

use App\Domain\DomainException\Plant\PlantAlreadyExistsException;
use App\Domain\Model\Plant\Plant;
use App\Domain\DomainException\Plant\PlantNotFoundException;
use App\Domain\Repository\PlantRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ElloquentPlantRepository implements PlantRepository
{
    /**
     * {@inheritdoc}
     */
    public function findAll(?array $filters = null): array
    {
        $query = Plant::query();

        if ($filters) {
            $query->where($filters);
        }

        return $query->get()->toArray();
    }

    /**
     * {@inheritdoc}
     */
    public function findPlantOfId(int $id): Plant
    {
        try {
            return Plant::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new PlantNotFoundException();
        }
    }


    /**
     * {@inheritdoc}
     */
    public function deletePlant(int $id): bool
    {
        $plant = $this->findPlantOfId($id);
        return $plant->delete();
    }


    /**
     * {@inheritdoc}
     */
    public function createPlant(array $data): Plant
    {
        $plant = Plant::create($data);
        if (!$plant) {
            throw new PlantAlreadyExistsException();
        }
        return $plant;
    }


    /**
     * {@inheritdoc}
     */
    public function updatePlant(int $id, array $data): bool
    {
        $plant = $this->findPlantOfId($id);
        return $plant->update($data);
    }
}
