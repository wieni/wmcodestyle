<?php

namespace Wieni\wmcodestyle\PhpCsFixer\Config;

use PhpCsFixer\Config;
use RuntimeException;
use Wieni\wmcodestyle\PhpCsFixer\Config\RuleSet\RuleSetInterface;
use Wieni\wmcodestyle\PhpCsFixer\Fixer\CreateMethodOrderFixer;

final class Factory
{
    public static function fromRuleSet(RuleSetInterface $ruleSet, array $overrideRules = []): Config
    {
        if (\PHP_VERSION_ID < $ruleSet->getTargetPhpVersion()) {
            throw new RuntimeException(\sprintf('Current PHP version "%s is less than targeted PHP version "%s".', \PHP_VERSION_ID, $ruleSet->getTargetPhpVersion()));
        }

        $rules = $ruleSet->getRules();
        $config = new Config($ruleSet->getName());

        $config->registerCustomFixers([
            new CreateMethodOrderFixer(),
        ]);

        if (getenv('WMCODESTYLE_RISKY')) {
            $config->setRiskyAllowed(true);
            $rules = array_merge($rules, $ruleSet->getRiskyRules());
        }

        $rules = array_merge($rules, $overrideRules);
        $config->setRules($rules);

        return $config;
    }
}
