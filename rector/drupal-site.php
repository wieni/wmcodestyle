<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Wieni\wmcodestyle\Rector\SetList as WieniSetList;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    $parameters->set(Option::AUTO_IMPORT_NAMES, true);
    $parameters->set(Option::IMPORT_SHORT_CLASSES, false);

    $parameters->set(Option::FILE_EXTENSIONS, [
        'php',
        'inc',
        'install',
        'module',
    ]);

    $parameters->set(Option::SETS, [
        SetList::DEAD_DOC_BLOCK,
        SetList::PHP_73,
        SetList::PHP_74,
        SetList::TWIG_UNDERSCORE_TO_NAMESPACE,
    ]);

    $containerConfigurator->import(WieniSetList::CODE_QUALITY);
    $containerConfigurator->import(WieniSetList::CODING_STYLE);
    $containerConfigurator->import(WieniSetList::DEPENDENCY_INJECTION);
    $containerConfigurator->import(WieniSetList::EARLY_RETURN);
    $containerConfigurator->import(WieniSetList::TYPE_DECLARATION);
};
