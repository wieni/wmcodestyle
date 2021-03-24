<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Assign\CombinedAssignRector;
use Rector\CodeQuality\Rector\Assign\SplitListAssignToSeparateLineRector;
use Rector\CodeQuality\Rector\BooleanAnd\SimplifyEmptyArrayCheckRector;
use Rector\CodeQuality\Rector\BooleanNot\SimplifyDeMorganBinaryRector;
use Rector\CodeQuality\Rector\Catch_\ThrowWithPreviousExceptionRector;
use Rector\CodeQuality\Rector\Class_\CompleteDynamicPropertiesRector;
use Rector\CodeQuality\Rector\ClassMethod\DateTimeToDateTimeInterfaceRector;
use Rector\CodeQuality\Rector\Concat\JoinStringConcatRector;
use Rector\CodeQuality\Rector\Equal\UseIdenticalOverEqualWithSameTypeRector;
use Rector\CodeQuality\Rector\Expression\InlineIfToExplicitIfRector;
use Rector\CodeQuality\Rector\Foreach_\SimplifyForeachToArrayFilterRector;
use Rector\CodeQuality\Rector\Foreach_\UnusedForeachValueToArrayKeysRector;
use Rector\CodeQuality\Rector\FuncCall\ArrayKeysAndInArrayToArrayKeyExistsRector;
use Rector\CodeQuality\Rector\FuncCall\ChangeArrayPushToArrayAssignRector;
use Rector\CodeQuality\Rector\FuncCall\CompactToVariablesRector;
use Rector\CodeQuality\Rector\FuncCall\InArrayAndArrayKeysToArrayKeyExistsRector;
use Rector\CodeQuality\Rector\FuncCall\IntvalToTypeCastRector;
use Rector\CodeQuality\Rector\FuncCall\IsAWithStringWithThirdArgumentRector;
use Rector\CodeQuality\Rector\FuncCall\RemoveSoleValueSprintfRector;
use Rector\CodeQuality\Rector\FuncCall\SetTypeToCastRector;
use Rector\CodeQuality\Rector\FuncCall\SimplifyFuncGetArgsCountRector;
use Rector\CodeQuality\Rector\FuncCall\SimplifyInArrayValuesRector;
use Rector\CodeQuality\Rector\FuncCall\SimplifyStrposLowerRector;
use Rector\CodeQuality\Rector\FuncCall\UnwrapSprintfOneArgumentRector;
use Rector\CodeQuality\Rector\Identical\BooleanNotIdenticalToNotIdenticalRector;
use Rector\CodeQuality\Rector\Identical\GetClassToInstanceOfRector;
use Rector\CodeQuality\Rector\Identical\SimplifyArraySearchRector;
use Rector\CodeQuality\Rector\Identical\SimplifyBoolIdenticalTrueRector;
use Rector\CodeQuality\Rector\Identical\SimplifyConditionsRector;
use Rector\CodeQuality\Rector\If_\CombineIfRector;
use Rector\CodeQuality\Rector\If_\ConsecutiveNullCompareReturnsToNullCoalesceQueueRector;
use Rector\CodeQuality\Rector\If_\ShortenElseIfRector;
use Rector\CodeQuality\Rector\If_\SimplifyIfElseToTernaryRector;
use Rector\CodeQuality\Rector\If_\SimplifyIfReturnBoolRector;
use Rector\CodeQuality\Rector\LogicalAnd\LogicalToBooleanRector;
use Rector\CodeQuality\Rector\Name\FixClassCaseSensitivityNameRector;
use Rector\CodeQuality\Rector\NotEqual\CommonNotEqualRector;
use Rector\CodeQuality\Rector\Return_\SimplifyUselessVariableRector;
use Rector\CodeQuality\Rector\Ternary\SwitchNegatedTernaryRector;
use Rector\Renaming\Rector\FuncCall\RenameFunctionRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->set(CombinedAssignRector::class);
    $services->set(SplitListAssignToSeparateLineRector::class);
    $services->set(SimplifyEmptyArrayCheckRector::class);
    $services->set(SimplifyDeMorganBinaryRector::class);
    $services->set(ThrowWithPreviousExceptionRector::class);
    $services->set(CompleteDynamicPropertiesRector::class);
    $services->set(DateTimeToDateTimeInterfaceRector::class);
    $services->set(JoinStringConcatRector::class);
    $services->set(UseIdenticalOverEqualWithSameTypeRector::class);
    $services->set(InlineIfToExplicitIfRector::class);
    $services->set(SimplifyForeachToArrayFilterRector::class);
    $services->set(SimplifyForeachToArrayFilterRector::class);
    $services->set(UnusedForeachValueToArrayKeysRector::class);
    $services->set(ArrayKeysAndInArrayToArrayKeyExistsRector::class);
    $services->set(ChangeArrayPushToArrayAssignRector::class);
    $services->set(CompactToVariablesRector::class);
    $services->set(InArrayAndArrayKeysToArrayKeyExistsRector::class);
    $services->set(IntvalToTypeCastRector::class);
    $services->set(IsAWithStringWithThirdArgumentRector::class);
    $services->set(RemoveSoleValueSprintfRector::class);
    $services->set(SetTypeToCastRector::class);
    $services->set(SimplifyFuncGetArgsCountRector::class);
    $services->set(SimplifyInArrayValuesRector::class);
    $services->set(SimplifyStrposLowerRector::class);
    $services->set(UnwrapSprintfOneArgumentRector::class);
    $services->set(BooleanNotIdenticalToNotIdenticalRector::class);
    $services->set(GetClassToInstanceOfRector::class);
    $services->set(SimplifyArraySearchRector::class);
    $services->set(SimplifyBoolIdenticalTrueRector::class);
    $services->set(SimplifyConditionsRector::class);
    $services->set(CombineIfRector::class);
    $services->set(ConsecutiveNullCompareReturnsToNullCoalesceQueueRector::class);
    $services->set(ShortenElseIfRector::class);
    $services->set(SimplifyIfElseToTernaryRector::class);
    $services->set(SimplifyIfReturnBoolRector::class);
    $services->set(LogicalToBooleanRector::class);
    $services->set(FixClassCaseSensitivityNameRector::class);
    $services->set(CommonNotEqualRector::class);
    $services->set(SimplifyUselessVariableRector::class);
    $services->set(SwitchNegatedTernaryRector::class);

    $services->set(RenameFunctionRector::class)
        ->call('configure', [[
            RenameFunctionRector::OLD_FUNCTION_TO_NEW_FUNCTION => [
                'split' => 'explode',
                'join' => 'implode',
                'sizeof' => 'count',
                // https://www.php.net/manual/en/aliases.php
                'chop' => 'rtrim',
                'doubleval' => 'floatval',
                'gzputs' => 'gzwrites',
                'fputs' => 'fwrite',
                'ini_alter' => 'ini_set',
                'is_double' => 'is_float',
                'is_integer' => 'is_int',
                'is_long' => 'is_int',
                'is_real' => 'is_float',
                'is_writeable' => 'is_writable',
                'key_exists' => 'array_key_exists',
                'pos' => 'current',
                'strchr' => 'strstr',
                // mb
                'mbstrcut' => 'mb_strcut',
                'mbstrlen' => 'mb_strlen',
                'mbstrpos' => 'mb_strpos',
                'mbstrrpos' => 'mb_strrpos',
                'mbsubstr' => 'mb_substr',
            ],
        ],
        ]);
};
