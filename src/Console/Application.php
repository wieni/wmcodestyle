<?php

namespace Wieni\wmcodestyle\Console;

use Wieni\wmcodestyle\Console\Command\SyncCommand;
use Symfony\Component\Console\Application as BaseApplication;

class Application extends BaseApplication
{
    public const VERSION = '1.0.0';

    public function __construct()
    {
        parent::__construct('wmcodestyle', self::VERSION);

        $this->add(new SyncCommand());
    }
}
