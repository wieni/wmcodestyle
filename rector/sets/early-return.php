<?php

declare (strict_types=1);

use Rector\EarlyReturn\Rector\If_\ChangeAndIfToEarlyReturnRector;
use Rector\EarlyReturn\Rector\If_\ChangeOrIfContinueToMultiContinueRector;
use Rector\EarlyReturn\Rector\If_\ChangeOrIfReturnToEarlyReturnRector;
use Rector\EarlyReturn\Rector\Return_\ReturnBinaryAndToEarlyReturnRector;
use Rector\EarlyReturn\Rector\Return_\ReturnBinaryOrToEarlyReturnRector;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(SetList::EARLY_RETURN);

    $services = $containerConfigurator->services();
    $services->remove(ChangeAndIfToEarlyReturnRector::class);
    $services->remove(ReturnBinaryAndToEarlyReturnRector::class);
    $services->remove(ChangeOrIfReturnToEarlyReturnRector::class);
    $services->remove(ChangeOrIfContinueToMultiContinueRector::class);
    $services->remove(ReturnBinaryOrToEarlyReturnRector::class);
};
