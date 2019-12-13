<?php

namespace Drupal\wmcodestyle\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;

class LinkCommand extends Command
{
    public const COMMAND_NAME = 'link';

    protected function configure()
    {
        $this
            ->setName(self::COMMAND_NAME)
            ->setDescription('Link the php-cs-fixer config file to the project root.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $fileName = '.php_cs.php';
        $packageRoot = __DIR__ . '/../../..';
        $projectRoot = $this->getComposerRoot();
        $relativePackageRoot = substr(realpath($packageRoot), strlen(realpath($projectRoot)));

        $source = '.' . implode('/', [$relativePackageRoot, $fileName]);
        $destination = implode('/', [$projectRoot, $fileName]);

        if (file_exists($destination)) {
            if ($io->confirm("An existing config is found at {$destination}. Overwrite?")) {
                unlink($destination);
            } else {
                return;
            }
        }

        try {
            echo $this->getRelativePath($source, $destination);
            exec("ln -s {$source} ./{$fileName}}");
        } catch (IOException $e) {
            $io->error($e->getMessage());
            return;
        }

        $io->success('Successfully linked the php-cs-fixer config to ' . $destination);
    }

    protected function getComposerRoot(): ?string
    {
        $composerRoot = null;
        $dir = __DIR__;

        do {
            if (
                file_exists($dir . '/composer.json')
                && dirname($dir) !== 'wmcodestyle'
            ) {
                $composerRoot = $dir;
            }

            $dir = realpath($dir . '/..');
        } while ($dir !== '/');

        return $composerRoot;
    }

    protected function getRelativePath(string $from, string $to): string
    {
        $dir = explode(DIRECTORY_SEPARATOR, is_file($from) ? dirname($from) : rtrim($from, DIRECTORY_SEPARATOR));
        $file = explode(DIRECTORY_SEPARATOR, $to);

        while ($dir && $file && ($dir[0] == $file[0])) {
            array_shift($dir);
            array_shift($file);
        }

        return str_repeat('..' . DIRECTORY_SEPARATOR, count($dir)) . implode(DIRECTORY_SEPARATOR, $file);
    }
}
