<?php

namespace Drupal\wmcodestyle\Commands;

use Consolidation\AnnotatedCommand\AnnotationData;
use Drush\Commands\DrushCommands;
use PhpCsFixer\Console\Command\FixCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\StringInput;

class PhpCsFixerCommands extends DrushCommands
{
    protected $optionsMap = [
        'fixer-config' => 'config',
    ];

    /**
     * Fixes a directory or a file.
     *
     * @param $path The path.
     * @return int
     *
     * @command phpcs:fix
     * @aliases fix
     * @bootstrap none
     */
    public function fix($path = null, $options = [])
    {
        $arguments = [];
        $extra = [];

        if ($path) {
            $arguments['path'] = $path;
        }

        if ($options['changed-only'] && $changedFiles = $this->getChangedFiles()) {
            $options['path-mode'] = 'intersection';
            $extra = $changedFiles;
        }

        foreach ($options as $name => $option) {
            if (isset($this->optionsMap[$name])) {
                $options[$this->optionsMap[$name]] = $option;
                unset($options[$name]);
            }
        }

        $application = new \PhpCsFixer\Console\Application();
        $application->setAutoExit(false);

        return $this->runCommand($application, FixCommand::getDefaultName(), $arguments, $options, $extra);
    }

    /** @hook option phpcs:fix */
    public function fixOptions(Command $command, AnnotationData $annotationData)
    {
        // Standard
        $command->addOption('path-mode', '', InputOption::VALUE_REQUIRED, 'Specify path mode (can be override or intersection).', 'override');
        $command->addOption('allow-risky', '', InputOption::VALUE_REQUIRED, 'Are risky fixers allowed (can be yes or no).');
        $command->addOption('fixer-config', '', InputOption::VALUE_REQUIRED, 'The path to a .php_cs file.');
        $command->addOption('dry-run', '', InputOption::VALUE_OPTIONAL, 'Only shows which files would have been modified.');
        $command->addOption('rules', '', InputOption::VALUE_REQUIRED, 'The rules.');
        $command->addOption('using-cache', '', InputOption::VALUE_REQUIRED, 'Does cache should be used (can be yes or no).');
        $command->addOption('cache-file', '', InputOption::VALUE_REQUIRED, 'The path to the cache file.');
        $command->addOption('diff', '', InputOption::VALUE_OPTIONAL, 'Also produce diff for each file.');
        $command->addOption('diff-format', '', InputOption::VALUE_REQUIRED, 'Specify diff format.');
        $command->addOption('format', '', InputOption::VALUE_REQUIRED, 'To output results in other formats.');
        $command->addOption('stop-on-violation', '', InputOption::VALUE_OPTIONAL, 'Stop execution on first violation.');
        $command->addOption('show-progress', '', InputOption::VALUE_REQUIRED, 'Type of progress indicator (none, run-in, estimating, estimating-max or dots).');

        // Custom
        $command->addOption('changed-only', '', InputOption::VALUE_OPTIONAL, 'Only fix changed files.');
    }

    protected function getChangedFiles(): ?array
    {
        drush_shell_exec('git diff HEAD --name-only --diff-filter=ACMRTUXB');
        $output = drush_shell_exec_output();

        if (strpos($output[0], 'fatal:') === 0) {
            return null;
        }

        return array_map(
            function ($path) {
                return "../$path";
            },
            $output
        );
    }

    protected function runCommand(Application $application, string $commandName, array $arguments, array $options, array $extra = []): int
    {
        $definition = $application->get($commandName)->getDefinition();
        $argv = [$commandName];

        foreach ($arguments as $key => $value) {
            if (empty($value) || !$definition->hasArgument($key)) {
                continue;
            }

            $argv[] = $value;
        }

        foreach ($options as $key => $value) {
            if (empty($value) || (!$definition->hasOption($key) && !in_array($key, ['verbose']))) {
                continue;
            }

            if (filter_var($value, FILTER_VALIDATE_BOOLEAN)) {
                $argv[] = sprintf('--%s', $key);
            } else {
                $argv[] = sprintf('--%s=%s', $key, $value);
            }
        }

        if (!empty($extra)) {
            $argv[] = '--';
            $argv = array_merge($argv, $extra);
        }

        return $application->run(new StringInput(implode(' ', $argv)));
    }
}
