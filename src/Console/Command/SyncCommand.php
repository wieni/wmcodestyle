<?php

namespace Wieni\wmcodestyle\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
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
            ->setDescription('Sync files to the root of the project requiring this package.')
            ->addArgument('file_name', InputArgument::REQUIRED | InputArgument::IS_ARRAY, 'The file(s) to copy');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $packageRoot = __DIR__ . '/../../..';
        $projectRoot = $this->getComposerRoot();

        $fileName = $input->getArgument('file_name');
        $source = implode(DIRECTORY_SEPARATOR, [$packageRoot, $fileName]);
        $destination = implode(DIRECTORY_SEPARATOR, [$projectRoot, $fileName]);

        if (file_exists($destination)) {
            if ($io->confirm("The file {$fileName} already exists at {$projectRoot}. Overwrite?")) {
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

        $io->success("Successfully copied {$fileName} to {$projectRoot}.");
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
