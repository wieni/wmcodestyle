<?php

namespace Drupal\wmcodestyle\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;

class SyncCommand extends Command
{
    public const COMMAND_NAME = 'sync';

    /** @var Filesystem */
    protected $filesystem;

    public function __construct()
    {
        parent::__construct();
        $this->filesystem = new Filesystem();
    }

    protected function configure()
    {
        $this
            ->setName(self::COMMAND_NAME)
            ->setDescription('Sync the php-cs-fixer config file to the project root.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $packageRoot = __DIR__ . '/../../..';
        $projectRoot = $this->getComposerRoot();

        $source = $packageRoot . '/.php_cs.php';
        $destination = $projectRoot . '/.php_cs.dist';

        if (file_exists($destination)) {
            if ($io->confirm("An existing config is found at {$destination}. Overwrite?")) {
                unlink($destination);
            } else {
                return;
            }
        }

        try {
            $this->filesystem->copy($source, $destination, true);
        } catch (IOException $e) {
            $io->error($e->getMessage());
            return;
        }

        $io->success('Successfully copied the php-cs-fixer config to ' . $destination);
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
}
