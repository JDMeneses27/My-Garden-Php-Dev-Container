<?php

declare(strict_types=1);

namespace App\Domain\DomainException\Plant;

use App\Domain\DomainException\DomainRecordConflictException;

class PlantAlreadyExistsException extends DomainRecordConflictException
{
    public $message = 'La planta ya se encuentra registrada.';
}
