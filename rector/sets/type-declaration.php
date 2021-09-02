<?php

declare(strict_types=1);

use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\ClassMethod\AddArrayParamDocTypeRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddArrayReturnDocTypeRector;
use RectorPrefix20210827\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(SetList::TYPE_DECLARATION);

    $services = $containerConfigurator->services();
    $services->remove(AddArrayParamDocTypeRector::class);
    $services->remove(AddArrayReturnDocTypeRector::class);
};
