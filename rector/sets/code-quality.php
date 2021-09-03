<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\New_\NewStaticToNewSelfRector;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(SetList::CODE_QUALITY);

    $services = $containerConfigurator->services();
    $services->remove(NewStaticToNewSelfRector::class);
};
