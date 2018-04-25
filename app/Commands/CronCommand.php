<?php

namespace App\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class CronCommand extends \App\System\Command
{
    protected function configure()
    {
        $this
        ->setName('cron')
        ->setDescription('sheduled tasks')
        ->setHelp('sheduled tasks');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Info line</info>');
        $output->writeln('Simple text line');
    }
}
