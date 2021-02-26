<?php

declare(strict_types=1);

use Drupal\Core\Entity\EntityFormBuilder;
use Drupal\Core\Entity\EntityFormBuilderInterface;
use Drupal\Core\Entity\EntityTypeBundleInfo;
use Drupal\Core\Entity\EntityTypeBundleInfoInterface;
use Drupal\Core\Entity\EntityTypeManager;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\File\FileSystem;
use Drupal\Core\File\FileSystemInterface;
use Drupal\Core\Language\LanguageManager;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\imgix\ImgixManager;
use Drupal\imgix\ImgixManagerInterface;
use Drupal\wmcontroller\Service\PresenterFactory;
use Drupal\wmcontroller\Service\PresenterFactoryInterface;
use Drupal\wmsingles\Service\WmSingles;
use Drupal\wmsingles\Service\WmSinglesInterface;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $classes = [
        EntityFormBuilder::class => EntityFormBuilderInterface::class,
        EntityTypeBundleInfo::class => EntityTypeBundleInfoInterface::class,
        EntityTypeManager::class => EntityTypeManagerInterface::class,
        FileSystem::class => FileSystemInterface::class,
        ImgixManager::class => ImgixManagerInterface::class,
        LanguageManager::class => LanguageManagerInterface::class,
        PresenterFactory::class => PresenterFactoryInterface::class,
        WmSingles::class => WmSinglesInterface::class,
    ];

    $classes = array_filter($classes, static function (string $from, string $to) {
        try {
            return (new ReflectionClass($from))->getFileName()
                && (new ReflectionClass($to))->getFileName();
        } catch (\ReflectionException $e) {
            return false;
        }
    }, ARRAY_FILTER_USE_BOTH);

    $services = $containerConfigurator->services();
    $services->set(RenameClassRector::class)
        ->call('configure', [[
            RenameClassRector::OLD_TO_NEW_CLASSES => $classes,
        ]]);
};
