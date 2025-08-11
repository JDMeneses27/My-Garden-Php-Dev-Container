<?php

declare(strict_types=1);

namespace App\Domain\DomainException\Plant;

use App\Domain\DomainException\DomainRecordNotFoundException;

class PlantNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'La planta que esta buscando no existe.';
}
