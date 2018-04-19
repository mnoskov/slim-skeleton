<?php

namespace App\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use App\Models\User;

class UserDeleteCommand extends Command
{
    protected function configure()
    {
        $this
        ->setName('users:delete')
        ->setDescription('deletes new user')
        ->addArgument('login', InputArgument::REQUIRED, 'Login');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $login = $input->getArgument('login');

        $user = User::where('login', $login)->first();

        if (!$user) {
            $output->writeln(sprintf('<error>User with login %s not exists!</error>', $login));
            return;
        }

        $user->delete();
        $output->writeln(sprintf('User %s deleted!', $login));
    }
}
