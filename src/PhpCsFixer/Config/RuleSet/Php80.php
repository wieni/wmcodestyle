<?php

namespace Wieni\wmcodestyle\PhpCsFixer\Config\RuleSet;

final class Php80 extends RuleSetBase
{
    protected $name = 'Wieni (PHP 8.0)';

    protected $rules = [
        '@Symfony' => true,
        '@PHP80Migration' => true,
        '@DoctrineAnnotation' => true,
        'binary_operator_spaces' => ['operators' => ['|' => null]]
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
        'list_syntax' => ['syntax' => 'short'],
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

    protected $riskyRules = [
        '@Symfony:risky' => true,
        '@PHP80Migration:risky' => true,
        'comment_to_phpdoc' => true,
        'declare_strict_types' => false,
        'native_constant_invocation' => false,
        'native_function_invocation' => false,
    ];

    protected $targetPhpVersion = 80000;
}
