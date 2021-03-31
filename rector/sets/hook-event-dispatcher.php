<?php

declare(strict_types=1);

use Rector\Renaming\Rector\Name\RenameClassRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $classes = [
        Drupal\hook_event_dispatcher\Event\Block\BaseBlockEvent::class => Symfony\Component\EventDispatcher\Event::class,
        Drupal\hook_event_dispatcher\Event\Block\BlockBuildAlterEvent::class => Drupal\core_event_dispatcher\Event\Block\BlockBuildAlterEvent::class,
        Drupal\hook_event_dispatcher\Event\Cron\CronEvent::class => Drupal\core_event_dispatcher\Event\Core\CronEvent::class,
        Drupal\hook_event_dispatcher\Event\Entity\BaseEntityEvent::class => Drupal\core_event_dispatcher\Event\Entity\AbstractEntityEvent::class,
        Drupal\hook_event_dispatcher\Event\Entity\EntityAccessEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityAccessEvent::class,
        Drupal\hook_event_dispatcher\Event\Entity\EntityCreateEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityCreateEvent::class,
        Drupal\hook_event_dispatcher\Event\Entity\EntityDeleteEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityDeleteEvent::class,
        Drupal\hook_event_dispatcher\Event\Entity\EntityInsertEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityInsertEvent::class,
        Drupal\hook_event_dispatcher\Event\Entity\EntityLoadEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityLoadEvent::class,
        Drupal\hook_event_dispatcher\Event\Entity\EntityPredeleteEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityPredeleteEvent::class,
        Drupal\hook_event_dispatcher\Event\Entity\EntityPresaveEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityPresaveEvent::class,
        Drupal\hook_event_dispatcher\Event\Entity\EntityTranslationDeleteEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityTranslationDeleteEvent::class,
        Drupal\hook_event_dispatcher\Event\Entity\EntityTranslationInsertEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityTranslationDeleteEvent::class,
        Drupal\hook_event_dispatcher\Event\Entity\EntityUpdateEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityUpdateEvent::class,
        Drupal\hook_event_dispatcher\Event\Entity\EntityViewEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityViewEvent::class,
        Drupal\hook_event_dispatcher\Event\EntityExtra\EntityExtraFieldInfoAlterEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityExtraFieldInfoAlterEvent::class,
        Drupal\hook_event_dispatcher\Event\EntityExtra\EntityExtraFieldInfoEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityExtraFieldInfoEvent::class,
        Drupal\hook_event_dispatcher\Event\EntityField\EntityFieldAccessEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityFieldAccessEvent::class,
        Drupal\hook_event_dispatcher\Event\EntityType\EntityBaseFieldInfoAlterEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityBaseFieldInfoAlterEvent::class,
        Drupal\hook_event_dispatcher\Event\EntityType\EntityBaseFieldInfoEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityBaseFieldInfoEvent::class,
        Drupal\hook_event_dispatcher\Event\EntityType\EntityBundleFieldInfoAlterEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityBundleFieldInfoAlterEvent::class,
        Drupal\hook_event_dispatcher\Event\EntityType\EntityTypeBuildEvent::class => Drupal\core_event_dispatcher\Event\Entity\EntityTypeBuildEvent::class,
        Drupal\hook_event_dispatcher\Event\Form\BaseFormEvent::class => Drupal\core_event_dispatcher\Event\Form\AbstractFormEvent::class,
        Drupal\hook_event_dispatcher\Event\Form\FormAlterEvent::class => Drupal\core_event_dispatcher\Event\Form\FormAlterEvent::class,
        Drupal\hook_event_dispatcher\Event\Form\FormBaseAlterEvent::class => Drupal\core_event_dispatcher\Event\Form\FormBaseAlterEvent::class,
        Drupal\hook_event_dispatcher\Event\Form\FormIdAlterEvent::class => Drupal\core_event_dispatcher\Event\Form\FormIdAlterEvent::class,
        Drupal\hook_event_dispatcher\Event\Form\WidgetFormAlterEvent::class => Drupal\field_event_dispatcher\Event\Field\WidgetFormAlterEvent::class,
        Drupal\hook_event_dispatcher\Event\Form\WidgetTypeFormAlterEvent::class => Drupal\field_event_dispatcher\Event\Field\WidgetTypeFormAlterEvent::class,
        Drupal\hook_event_dispatcher\Event\Page\PageAttachmentsEvent::class => Drupal\core_event_dispatcher\Event\Theme\PageAttachmentsEvent::class,
        Drupal\hook_event_dispatcher\Event\Page\PageBottomEvent::class => Drupal\core_event_dispatcher\Event\Theme\PageBottomEvent::class,
        Drupal\hook_event_dispatcher\Event\Page\PageTopEvent::class => Drupal\core_event_dispatcher\Event\Theme\PageTopEvent::class,
        Drupal\hook_event_dispatcher\Event\Path\BasePathEvent::class => Drupal\path_event_dispatcher\Event\Path\AbstractPathEvent::class,
        Drupal\hook_event_dispatcher\Event\Path\PathDeleteEvent::class => Drupal\path_event_dispatcher\Event\Path\PathDeleteEvent::class,
        Drupal\hook_event_dispatcher\Event\Path\PathInsertEvent::class => Drupal\path_event_dispatcher\Event\Path\PathInsertEvent::class,
        Drupal\hook_event_dispatcher\Event\Path\PathUpdateEvent::class => Drupal\path_event_dispatcher\Event\Path\PathUpdateEvent::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\AbstractPreprocessEntityEvent::class => Drupal\preprocess_event_dispatcher\Event\AbstractPreprocessEntityEvent::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\AbstractPreprocessEvent::class => Drupal\preprocess_event_dispatcher\Event\AbstractPreprocessEvent::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\BlockPreprocessEvent::class => Drupal\preprocess_event_dispatcher\Event\BlockPreprocessEvent::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\CommentPreprocessEvent::class => Drupal\preprocess_event_dispatcher\Event\CommentPreprocessEvent::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\EckEntityPreprocessEvent::class => Drupal\preprocess_event_dispatcher\Event\EckEntityPreprocessEvent::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\FieldPreprocessEvent::class => Drupal\preprocess_event_dispatcher\Event\FieldPreprocessEvent::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\FormPreprocessEvent::class => Drupal\preprocess_event_dispatcher\Event\FormPreprocessEvent::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\HtmlPreprocessEvent::class => Drupal\preprocess_event_dispatcher\Event\HtmlPreprocessEvent::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\ImagePreprocessEvent::class => Drupal\preprocess_event_dispatcher\Event\ImagePreprocessEvent::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\NodePreprocessEvent::class => Drupal\preprocess_event_dispatcher\Event\NodePreprocessEvent::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\PagePreprocessEvent::class => Drupal\preprocess_event_dispatcher\Event\PagePreprocessEvent::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\ParagraphPreprocessEvent::class => Drupal\preprocess_event_dispatcher\Event\ParagraphPreprocessEvent::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\PreprocessEntityEventInterface::class => Drupal\preprocess_event_dispatcher\Event\PreprocessEntityEventInterface::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\PreprocessEventInterface::class => Drupal\preprocess_event_dispatcher\Event\PreprocessEventInterface::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\TaxonomyTermPreprocessEvent::class => Drupal\preprocess_event_dispatcher\Event\TaxonomyTermPreprocessEvent::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\UsernamePreprocessEvent::class => Drupal\preprocess_event_dispatcher\Event\UsernamePreprocessEvent::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\ViewFieldPreprocessEvent::class => Drupal\preprocess_event_dispatcher\Event\ViewFieldPreprocessEvent::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\ViewPreprocessEvent::class => Drupal\preprocess_event_dispatcher\Event\ViewPreprocessEvent::class,
        Drupal\hook_event_dispatcher\Event\Preprocess\ViewTablePreprocessEvent::class => Drupal\preprocess_event_dispatcher\Event\ViewTablePreprocessEvent::class,
        Drupal\hook_event_dispatcher\Event\Theme\BaseThemeSuggestionsEvent::class => Drupal\core_event_dispatcher\Event\Theme\AbstractThemeSuggestionsEvent::class,
        Drupal\hook_event_dispatcher\Event\Theme\JsAlterEvent::class => Drupal\core_event_dispatcher\Event\Theme\JsAlterEvent::class,
        Drupal\hook_event_dispatcher\Event\Theme\LibraryInfoAlterEvent::class => Drupal\core_event_dispatcher\Event\Theme\LibraryInfoAlterEvent::class,
        Drupal\hook_event_dispatcher\Event\Theme\TemplatePreprocessDefaultVariablesAlterEvent::class => Drupal\core_event_dispatcher\Event\Theme\TemplatePreprocessDefaultVariablesAlterEvent::class,
        Drupal\hook_event_dispatcher\Event\Theme\ThemeEvent::class => Drupal\core_event_dispatcher\Event\Theme\ThemeEvent::class,
        Drupal\hook_event_dispatcher\Event\Theme\ThemeSuggestionsAlterEvent::class => Drupal\core_event_dispatcher\Event\Theme\ThemeSuggestionsAlterEvent::class,
        Drupal\hook_event_dispatcher\Event\Theme\ThemeSuggestionsAlterIdEvent::class => Drupal\core_event_dispatcher\Event\Theme\ThemeSuggestionsAlterIdEvent::class,
        Drupal\hook_event_dispatcher\Event\Token\TokensInfoEvent::class => Drupal\core_event_dispatcher\Event\Token\TokensInfoEvent::class,
        Drupal\hook_event_dispatcher\Event\Token\TokensReplacementEvent::class => Drupal\core_event_dispatcher\Event\Token\TokensReplacementEvent::class,
        Drupal\hook_event_dispatcher\Event\Toolbar\ToolbarAlterEvent::class => Drupal\toolbar_event_dispatcher\Event\Toolbar\ToolbarAlterEvent::class,
        Drupal\hook_event_dispatcher\Event\User\UserCancelEvent::class => Drupal\user_event_dispatcher\Event\User\UserCancelEvent::class,
        Drupal\hook_event_dispatcher\Event\User\UserCancelMethodsAlterEvent::class => Drupal\user_event_dispatcher\Event\User\UserCancelMethodsAlterEvent::class,
        Drupal\hook_event_dispatcher\Event\User\UserFormatNameAlterEvent::class => Drupal\user_event_dispatcher\Event\User\UserFormatNameAlterEvent::class,
        Drupal\hook_event_dispatcher\Event\User\UserLoginEvent::class => Drupal\user_event_dispatcher\Event\User\UserLoginEvent::class,
        Drupal\hook_event_dispatcher\Event\User\UserLogoutEvent::class => Drupal\user_event_dispatcher\Event\User\UserLogoutEvent::class,
        Drupal\hook_event_dispatcher\Event\Views\BaseViewsEvent::class => Drupal\views_event_dispatcher\Event\Views\AbstractViewsEvent::class,
        Drupal\hook_event_dispatcher\Event\Views\ViewsDataAlterEvent::class => Drupal\views_event_dispatcher\Event\Views\ViewsDataAlterEvent::class,
        Drupal\hook_event_dispatcher\Event\Views\ViewsDataEvent::class => Drupal\views_event_dispatcher\Event\Views\ViewsDataEvent::class,
        Drupal\hook_event_dispatcher\Event\Views\ViewsPostBuildEvent::class => Drupal\views_event_dispatcher\Event\Views\ViewsPostBuildEvent::class,
        Drupal\hook_event_dispatcher\Event\Views\ViewsPostExecuteEvent::class => Drupal\views_event_dispatcher\Event\Views\ViewsPostExecuteEvent::class,
        Drupal\hook_event_dispatcher\Event\Views\ViewsPreBuildEvent::class => Drupal\views_event_dispatcher\Event\Views\ViewsPreBuildEvent::class,
        Drupal\hook_event_dispatcher\Event\Views\ViewsPreExecuteEvent::class => Drupal\views_event_dispatcher\Event\Views\ViewsPreExecuteEvent::class,
        Drupal\hook_event_dispatcher\Event\Views\ViewsQueryAlterEvent::class => Drupal\views_event_dispatcher\Event\Views\ViewsQueryAlterEvent::class,
    ];

    $classes = array_filter($classes, static function (string $to, string $from) {
        try {
            return (new ReflectionClass($to))->getFileName();
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
