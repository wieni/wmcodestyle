<?php

declare(strict_types=1);

use Rector\CodingStyle\Rector\Assign\PHPStormVarAnnotationRector;
use Rector\CodingStyle\Rector\ClassConst\SplitGroupedConstantsAndPropertiesRector;
use Rector\CodingStyle\Rector\Encapsed\EncapsedStringsToSprintfRector;
use Rector\CodingStyle\Rector\FuncCall\CallUserFuncCallToVariadicRector;
use Rector\CodingStyle\Rector\FuncCall\ConsistentImplodeRector;
use Rector\CodingStyle\Rector\String_\SymplifyQuoteEscapeRector;
use Rector\CodingStyle\Rector\Switch_\BinarySwitchToIfElseRector;
use Rector\CodingStyle\Rector\Use_\RemoveUnusedAliasRector;
use Rector\CodingStyle\Rector\Use_\SplitGroupedUseImportsRector;
use Rector\TypeDeclaration\Rector\Closure\AddClosureReturnTypeRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->set(AddClosureReturnTypeRector::class);
    $services->set(PHPStormVarAnnotationRector::class);
    $services->set(BinarySwitchToIfElseRector::class);
    $services->set(ConsistentImplodeRector::class);
    $services->set(RemoveUnusedAliasRector::class);
    $services->set(SymplifyQuoteEscapeRector::class);
    $services->set(SplitGroupedConstantsAndPropertiesRector::class);
    $services->set(EncapsedStringsToSprintfRector::class);
    $services->set(CallUserFuncCallToVariadicRector::class);
    $services->set(SplitGroupedUseImportsRector::class);
};
