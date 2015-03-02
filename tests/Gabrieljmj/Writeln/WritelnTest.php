<?php
namespace Test\Gabrieljmj\Writeln;

use Gabrieljmj\Writeln\Writeln;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Tester\CommandTester;

class WritelnTest extends \PHPUnit_Framework_TestCase
{
    public function testCommandWithoutOptions()
    {
        $cl = new Writeln();
        $cl->command('hello',
        [
            $cl->argument('name', InputArgument::REQUIRED, 'Your name')
        ],
        [],
        function (InputInterface $input, OutputInterface $output) {
            $output->writeln('Hello ' . $input->getArgument('name'));
        });
        
        $command = $cl->find('hello');
        $tester = new CommandTester($command);
        $tester->execute([
            'command' => $command->getName(),
            'name'    => 'Gabriel'
        ]);
        
        $this->assertRegExp('/Hello Gabriel/', $tester->getDisplay());
    }
    
    public function testCommandWithOption()
    {
        $cl = new Writeln();
        $cl->command('hello',
        [
            $cl->argument('name', InputArgument::REQUIRED, 'Your name')
        ],
        [
            $cl->option('uppercase', 'u', InputOption::VALUE_NONE)
        ],
        function (InputInterface $input, OutputInterface $output) {
            $txt = $input->getOption('uppercase') ? strtoupper('Hello ' . $input->getArgument('name')) 
              : 'Hello ' . $input->getArgument('name');
            $output->writeln($txt);
        });
        
        $command = $cl->find('hello');
        $tester = new CommandTester($command);
        $tester->execute([
            'command' => $command->getName(),
            'name'    => 'Gabriel',
            '--uppercase' => null
        ]);
        
        $this->assertRegExp('/HELLO GABRIEL/', $tester->getDisplay());
        
        $tester->execute([
            'command' => $command->getName(),
            'name'    => 'Gabriel'
        ]);
        
        $this->assertRegExp('/Hello Gabriel/', $tester->getDisplay());
    }
}