<?php

declare(strict_types=1);

use Rector\CodingStyle\Rector\Assign\SplitDoubleAssignRector;
use Rector\CodingStyle\Rector\Catch_\CatchExceptionNameMatchingTypeRector;
use Rector\CodingStyle\Rector\Class_\AddArrayDefaultToArrayPropertyRector;
use Rector\CodingStyle\Rector\ClassConst\VarConstantCommentRector;
use Rector\CodingStyle\Rector\ClassMethod\MakeInheritedMethodVisibilitySameAsParentRector;
use Rector\CodingStyle\Rector\ClassMethod\NewlineBeforeNewAssignSetRector;
use Rector\CodingStyle\Rector\FuncCall\ConsistentPregDelimiterRector;
use Rector\CodingStyle\Rector\If_\NullableCompareToNullRector;
use Rector\CodingStyle\Rector\Plus\UseIncrementAssignRector;
use Rector\CodingStyle\Rector\PostInc\PostIncDecToPreIncDecRector;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(SetList::CODING_STYLE);

    $services = $containerConfigurator->services();
    $services->remove(NullableCompareToNullRector::class);
    $services->remove(CatchExceptionNameMatchingTypeRector::class);
    $services->remove(UseIncrementAssignRector::class);
    $services->remove(SplitDoubleAssignRector::class);
    $services->remove(VarConstantCommentRector::class);
    $services->remove(PostIncDecToPreIncDecRector::class);
    $services->remove(NewlineBeforeNewAssignSetRector::class);
    $services->remove(ConsistentPregDelimiterRector::class);
    $services->remove(AddArrayDefaultToArrayPropertyRector::class);
    $services->remove(MakeInheritedMethodVisibilitySameAsParentRector::class);
};
