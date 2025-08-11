<?php

declare(strict_types=1);

use App\Domain\Repository\PlantRepository;
use App\Infrastructure\Persistence\Plant\ElloquentPlantRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        PlantRepository::class => \DI\autowire(ElloquentPlantRepository::class),
    ]);
};
