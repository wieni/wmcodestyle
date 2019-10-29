<?php

namespace Drupal\wmcodestyle\Console;

use Drupal\wmcodestyle\Console\Command\LinkCommand;
use Symfony\Component\Console\Application as BaseApplication;

class Application extends BaseApplication
{
    public const VERSION = '1.0.0';

    public function __construct()
    {
        parent::__construct('wmcodestyle', self::VERSION);

        $this->add(new LinkCommand());
    }
}
