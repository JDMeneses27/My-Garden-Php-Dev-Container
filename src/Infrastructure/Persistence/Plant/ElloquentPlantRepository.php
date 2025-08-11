<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Domain\DomainException\User\UserAlreadyExistsException;
use App\Domain\Model\User\User;
use App\Domain\DomainException\User\UserNotFoundException;
use App\Domain\Repository\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ElloquentPlantRepository implements UserRepository
{
    /**
     * {@inheritdoc}
     */
    public function findAll(?array $filters = null): array
    {
        $query = User::query();

        if ($filters) {
            $query->where($filters);
        }

        return $query->get()->toArray();
    }

    /**
     * {@inheritdoc}
     */
    public function findOfId(int $id): User
    {
        try {
            return User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new UserNotFoundException();
        }
    }


    /**
     * {@inheritdoc}
     */
    public function deleteplant(int $id): bool
    {
        $plant = $this->findPlantOfId($id);
        return $plant->delete();
    }


    /**
     * {@inheritdoc}
     */
    public function createPlant(array $data): User
    {
        $plant = User::create($data);
        if (!$plant) {
            throw new UserAlreadyExistsException();
        }
        return $plant;
    }


    /**
     * {@inheritdoc}
     */
    public function updatePlant(int $id, array $data): bool
    {
        $plant = $this->findUserOfId($id);
        return $plant->update($data);
    }
}
