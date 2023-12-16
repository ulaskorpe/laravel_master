<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class TestCommand extends Command
{
    protected static $defaultName = 'my-command';
    protected static $defaultDescription = 'Add a short description for your command';

    protected function configure(): void
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }


    
        $io->title('this is title');
        $io->section('this is section');
        $io->text('this is text');
        $io->listing(['item1','item2','item3']);
        $io->newLine(2);
        $io->table(['name','surname'],
        [
            ['ulaş','körpe'],
            ['ulaş','körpe'],
            ['ulaş','körpe'],
            ['ulaş','körpe'],
            ['ulaş','körpe'],
            ['ulaş','körpe']
        ]
    );

 
        $io->success('You have a new command! Now make it your own! Pass --help to see your options.'. $arg1);

        return 0;
    }
}
