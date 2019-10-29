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
            ->setDescription('Link the php-cs-fixer config file to the project root.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $source = __DIR__ . '/../../../.php_cs.php';
        $destination = getcwd() . '/.php_cs.dist';

        if (file_exists($destination)) {
            if ($io->confirm("An existing config is found at {$destination}. Overwrite?")) {
                unlink($destination);
            } else {
                return;
            }
        }

        try {
            $this->filesystem->symlink($source, $destination);
        } catch (IOException $e) {
            $io->error($e->getMessage());
            return;
        }

        $io->success('Successfully linked the php-cs-fixer config to ' . $destination);
    }
}
