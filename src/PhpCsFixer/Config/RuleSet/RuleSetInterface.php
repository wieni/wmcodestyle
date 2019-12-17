<?php

namespace Wieni\wmcodestyle\PhpCsFixer\Config\RuleSet;

interface RuleSetInterface
{
    /** Returns the name of the rule set. */
    public function getName(): string;

    /** Returns an array of rules along with their configuration. */
    public function getRules(): array;

    /**
     * Returns the minimum required PHP version (PHP_VERSION_ID).
     *
     * @see http://php.net/manual/en/reserved.constants.php
     *
     */
    public function getTargetPhpVersion(): int;
}
