<?php

declare(strict_types=1);

namespace App\Domain\DomainException\plant;

use App\Domain\DomainException\DomainRecordNotFoundException;

class PlantsNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'La planta que esta buscando no existe.';
}
