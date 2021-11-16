<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\TwigSetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Wieni\wmcodestyle\Rector\SetList as WieniSetList;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    $parameters->set(Option::AUTO_IMPORT_NAMES, true);
    $parameters->set(Option::IMPORT_SHORT_CLASSES, false);

    $parameters->set(Option::PATHS, [
        __DIR__ . '/*.php',
        __DIR__ . '/rector',
        __DIR__ . '/src',
    ]);

    $parameters->set(Option::SKIP, [
        'rector/sets/dependency-injection.php',
        'rector/sets/hook-event-dispatcher.php',
    ]);

    $parameters->set(Option::AUTOLOAD_PATHS, [
        __DIR__ . '/src',
    ]);

    $containerConfigurator->import(SetList::DEAD_CODE);
    $containerConfigurator->import(TwigSetList::TWIG_UNDERSCORE_TO_NAMESPACE);
    $containerConfigurator->import(WieniSetList::CODE_QUALITY);
    $containerConfigurator->import(WieniSetList::CODING_STYLE);
    $containerConfigurator->import(WieniSetList::EARLY_RETURN);
    $containerConfigurator->import(WieniSetList::TYPE_DECLARATION);
};
