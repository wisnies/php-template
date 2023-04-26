<?php

declare(strict_types=1);

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExampleCommand extends Command
{
    protected static $defaultName = 'app:example-command';
    protected static $description = 'Example command';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->write('Hello World!', true);
        return Command::SUCCESS;
    }
}