<?php

declare(strict_types=1);

use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnNeverTypeRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(SetList::PHP_81);

    $services = $containerConfigurator->services();
    $services->remove(ReturnNeverTypeRector::class);
};
