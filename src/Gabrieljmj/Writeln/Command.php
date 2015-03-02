<?php
namespace Gabrieljmj\Writeln;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends SymfonyCommand
{
    private $callback;
    
    public function setCallback(callable $callback)
    {
        $this->callback = $callback;
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        call_user_func($this->callback, $input, $output);
    }
}