<?php

declare(strict_types=1);

use Drupal\Core\Entity\EntityFormBuilder;
use Drupal\Core\Entity\EntityFormBuilderInterface;
use Drupal\Core\Entity\EntityTypeBundleInfo;
use Drupal\Core\Entity\EntityTypeBundleInfoInterface;
use Drupal\Core\Entity\EntityTypeManager;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Language\LanguageManager;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\wmsingles\Service\WmSingles;
use Drupal\wmsingles\Service\WmSinglesInterface;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->set(RenameClassRector::class)
        ->call('configure', [[
            RenameClassRector::OLD_TO_NEW_CLASSES => [
                EntityFormBuilder::class => EntityFormBuilderInterface::class,
                EntityTypeBundleInfo::class => EntityTypeBundleInfoInterface::class,
                EntityTypeManager::class => EntityTypeManagerInterface::class,
                LanguageManager::class => LanguageManagerInterface::class,
                WmSingles::class => WmSinglesInterface::class,
            ],
        ]]);
};
