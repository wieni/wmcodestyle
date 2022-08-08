<?php

namespace Wieni\wmcodestyle\PhpCsFixer\Config\RuleSet;

final class Php81 extends RuleSetBase
{
    /** @var string */
    protected $name = 'Wieni (PHP 8.1)';

    /** @var array<string, array|bool> */
    protected $rules = [
        '@Symfony' => true,
        '@PHP81Migration' => true,
        '@DoctrineAnnotation' => true,
        'binary_operator_spaces' => ['operators' => ['|' => null]],
        'blank_line_before_statement' => false,
        'class_definition' => [
            'multi_line_extends_each_single_line' => true,
            'single_item_single_line' => true,
            'single_line' => false,
        ],
        'concat_space' => ['spacing' => 'one'],
        'doctrine_annotation_spaces' => [
            'after_argument_assignments' => true,
            'before_argument_assignments' => true,
        ],
        'explicit_indirect_variable' => true,
        'global_namespace_import' => false,
        'increment_style' => ['style' => 'post'],
        'no_superfluous_phpdoc_tags' => [
            'allow_mixed' => true,
            'remove_inheritdoc' => true,
        ],
        'no_useless_return' => true,
        'nullable_type_declaration_for_default_null_value' => true,
        'operator_linebreak' => true,
        'ordered_class_elements' => true,
        'phpdoc_align' => false,
        'phpdoc_annotation_without_dot' => false,
        'phpdoc_line_span' => [
            'const' => 'single',
            'method' => 'single',
            'property' => 'single',
        ],
        'phpdoc_separation' => false,
        'phpdoc_summary' => false,
        'phpdoc_to_comment' => false,
        'simplified_if_return' => true,
        'single_line_throw' => false,
        'yoda_style' => false,
        'Wieni/create_method_order' => true,
    ];

    /** @var array<string, array|bool> */
    protected $riskyRules = [
        '@Symfony:risky' => true,
        '@PHP81Migration:risky' => true,
        'comment_to_phpdoc' => true,
        'declare_strict_types' => false,
        'native_constant_invocation' => false,
        'native_function_invocation' => false,
    ];

    /** @var int */
    protected $targetPhpVersion = 80000;
}
