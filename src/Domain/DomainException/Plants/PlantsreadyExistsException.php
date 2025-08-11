<?php

declare(strict_types=1);

namespace App\Domain\DomainException\plant;

use App\Domain\DomainException\DomainRecordConflictException;

class PlantsAlreadyExistsException extends DomainRecordConflictException
{
    public $message = 'La planta ya se encuentra registrada.';
}
