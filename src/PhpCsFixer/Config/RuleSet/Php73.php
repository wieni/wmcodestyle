<?php

namespace Wieni\wmcodestyle\PhpCsFixer\Config\RuleSet;

final class Php73 extends RuleSetBase
{
    protected $name = 'Wieni (PHP 7.3)';

    protected $rules = [
        '@Symfony' => true,
        '@PHP73Migration' => true,
        '@DoctrineAnnotation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'backtick_to_shell_exec' => true,
        'blank_line_after_opening_tag' => false,
        'blank_line_before_statement' => false,
        'concat_space' => ['spacing' => 'one'],
        'doctrine_annotation_spaces' => [
            'after_argument_assignments' => true,
            'before_argument_assignments' => true,
        ],
        'explicit_indirect_variable' => true,
        'fully_qualified_strict_types' => true,
        'global_namespace_import' => true,
        'hash_to_slash_comment' => false,
        'increment_style' => ['style' => 'post'],
        'indentation_type' => true,
        'linebreak_after_opening_tag' => true,
        'list_syntax' => ['syntax' => 'short'],
        'modernize_types_casting' => true,
        'new_with_braces' => false,
        'no_empty_phpdoc' => false,
        'no_extra_consecutive_blank_lines' => [
            'tokens' => [
                'curly_brace_block',
                'extra',
                'parenthesis_brace_block',
                'square_brace_block',
                'throw',
                'use',
                'break',
                'continue',
                'return',
            ],
        ],
        'no_superfluous_phpdoc_tags' => [
            'allow_mixed' => true,
            'remove_inheritdoc' => true,
        ],
        'no_useless_return' => true,
        'non_printable_character' => ['use_escape_sequences_in_strings' => true],
        'nullable_type_declaration_for_default_null_value' => true,
        'ordered_class_elements' => true,
        'ordered_imports' => true,
        'phpdoc_align' => false,
        'phpdoc_annotation_without_dot' => false,
        'phpdoc_indent' => false,
        'phpdoc_inline_tag' => false,
        'phpdoc_line_span' => [
            'const' => 'single',
            'method' => 'single',
            'property' => 'single',
        ],
        'phpdoc_no_access' => false,
        'phpdoc_no_alias_tag' => false,
        'phpdoc_no_package' => false,
        'phpdoc_return_self_reference' => false,
        'phpdoc_separation' => false,
        'phpdoc_single_line_var_spacing' => false,
        'phpdoc_summary' => false,
        'phpdoc_to_comment' => false,
        'phpdoc_trim' => false,
        'single_blank_line_before_namespace' => false,
        'yoda_style' => false,
        'Wieni/create_method_order' => true,
    ];

    protected $targetPhpVersion = 70300;
}
