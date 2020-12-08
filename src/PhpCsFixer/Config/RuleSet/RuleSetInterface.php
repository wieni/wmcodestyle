<?php

namespace Wieni\wmcodestyle\PhpCsFixer\Config\RuleSet;

interface RuleSetInterface
{
    /** Returns the name of the rule set. */
    public function getName(): string;

    /**
     * Returns an array of rules along with their configuration.
     * @see https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/doc/rules/index.rst
     * @see https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/doc/ruleSets/index.rst
     */
    public function getRules(): array;

    /**
     * Returns an array of risky rules along with their configuration.
     * @see https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/doc/rules/index.rst
     * @see https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/doc/ruleSets/index.rst
     */
    public function getRiskyRules(): array;

    /**
     * Returns the minimum required PHP version (PHP_VERSION_ID).
     * @see http://php.net/manual/en/reserved.constants.php
     */
    public function getTargetPhpVersion(): int;
}
