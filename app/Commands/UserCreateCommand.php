<?php

namespace App\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use App\Models\User;

class UserCreateCommand extends \App\System\Command
{
    protected function configure()
    {
        $this
        ->setName('users:create')
        ->setDescription('creates new user')
        ->addArgument('login', InputArgument::REQUIRED, 'Login')
        ->addArgument('password', InputArgument::REQUIRED, 'Password');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $login    = $input->getArgument('login');
        $password = $input->getArgument('password');

        if (User::where('login', $login)->exists()) {
            $output->writeln(sprintf('<error>User with login %s already exists!</error>', $login));
            return;
        }

        $user = new User;
        $user->login = $login;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->save();
        
        $output->writeln(sprintf('User created!%slogin:    %s%spassword: %s', PHP_EOL, $login, PHP_EOL, $password));
    }
}
