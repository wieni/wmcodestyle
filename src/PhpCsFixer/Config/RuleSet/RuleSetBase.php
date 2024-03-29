<?php

namespace Wieni\wmcodestyle\PhpCsFixer\Config\RuleSet;

/**
 * @internal
 */
abstract class RuleSetBase implements RuleSetInterface
{
    /** @var string */
    protected $name;
    /** @var array<string, array|bool> */
    protected $rules = [];
    /** @var array<string, array|bool> */
    protected $riskyRules = [];
    /** @var int */
    protected $targetPhpVersion;

    final public function __construct(?string $header = null)
    {
        if (null === $header) {
            return;
        }

        $this->rules['header_comment'] = [
            'comment_type' => 'PHPDoc',
            'header' => \trim($header),
            'location' => 'after_declare_strict',
            'separate' => 'both',
        ];
    }

    final public function getName(): string
    {
        return $this->name;
    }

    final public function getRules(): array
    {
        return $this->rules;
    }

    final public function getRiskyRules(): array
    {
        return $this->riskyRules;
    }

    final public function getTargetPhpVersion(): int
    {
        return $this->targetPhpVersion;
    }
}
