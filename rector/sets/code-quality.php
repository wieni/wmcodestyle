<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Array_\ArrayThisCallToThisMethodCallRector;
use Rector\CodeQuality\Rector\Array_\CallableThisArrayToAnonymousFunctionRector;
use Rector\CodeQuality\Rector\If_\ExplicitBoolCompareRector;
use Rector\CodeQuality\Rector\If_\SimplifyIfElseToTernaryRector;
use Rector\CodeQuality\Rector\Isset_\IssetOnPropertyObjectToPropertyExistsRector;
use Rector\CodeQuality\Rector\New_\NewStaticToNewSelfRector;
use Rector\CodeQuality\Rector\PropertyFetch\ExplicitMethodCallOverMagicGetSetRector;
use Rector\CodingStyle\Rector\FuncCall\CountArrayToEmptyArrayComparisonRector;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(SetList::CODE_QUALITY);

    $services = $containerConfigurator->services();
    $services->remove(ArrayThisCallToThisMethodCallRector::class);
    $services->remove(CallableThisArrayToAnonymousFunctionRector::class);
    $services->remove(ExplicitBoolCompareRector::class);
    $services->remove(NewStaticToNewSelfRector::class);
    $services->remove(CountArrayToEmptyArrayComparisonRector::class);
    $services->remove(IssetOnPropertyObjectToPropertyExistsRector::class);
    // Ternaries are often less readable than if/else statements
    $services->remove(SimplifyIfElseToTernaryRector::class);
    // Return values of magic properties on TypedDataInterface (eg. value, entity) are not equal to their getters
    $services->remove(ExplicitMethodCallOverMagicGetSetRector::class);
};
