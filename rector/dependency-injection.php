<?php

declare(strict_types=1);

use Rector\Renaming\Rector\Name\RenameClassRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $classes = [
        Drupal\Core\Session\AccountProxy::class => Drupal\Core\Session\AccountProxyInterface::class,
        Drupal\Core\Routing\CurrentRouteMatch::class => Drupal\Core\Routing\RouteMatchInterface::class,
        Drupal\Core\Datetime\DateFormatter::class => Drupal\Core\Datetime\DateFormatterInterface::class,
        Drupal\Core\Entity\EntityFormBuilder::class => Drupal\Core\Entity\EntityFormBuilderInterface::class,
        Drupal\Core\Entity\EntityTypeBundleInfo::class => Drupal\Core\Entity\EntityTypeBundleInfoInterface::class,
        Drupal\Core\Entity\EntityTypeManager::class => Drupal\Core\Entity\EntityTypeManagerInterface::class,
        Drupal\Core\File\FileSystem::class => Drupal\Core\File\FileSystemInterface::class,
        Drupal\Core\Language\LanguageManager::class => Drupal\Core\Language\LanguageManagerInterface::class,
        Drupal\Core\Path\PathMatcher::class => Drupal\Core\Path\PathMatcherInterface::class,
        Drupal\Core\Render\Renderer::class => Drupal\Core\Render\RendererInterface::class,
        Drupal\file\Entity\File::class => Drupal\file\FileInterface::class,
        Drupal\imgix\ImgixManager::class => Drupal\imgix\ImgixManagerInterface::class,
        Drupal\wmcontroller\Service\PresenterFactory::class => Drupal\wmcontroller\Service\PresenterFactoryInterface::class,
        Drupal\wmmodel\Session\AccountProxy::class => Drupal\Core\Session\AccountProxyInterface::class,
        Drupal\wmsingles\Service\WmSingles::class => Drupal\wmsingles\Service\WmSinglesInterface::class,
    ];

    $classes = array_filter($classes, static function (string $to, string $from) {
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
