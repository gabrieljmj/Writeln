<?php
namespace Gabrieljmj\Writeln;
 
use Gabrieljmj\Writeln\Command;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
 
class Writeln extends Application
{
    public function command($name, array $arguments, array $options, callable $callback)
    {
        $command = $this->createCommand($name, $arguments, $options);
        $command->setCallback($callback);
        $this->add($command);
    }
 
    private function createCommand($name, array $arguments, array $options)
    {
        $command = new Command($name);
 
        foreach ($arguments as $argument) {
            $command->getDefinition()->addArgument($argument);
        }
 
        foreach ($options as $option) {
            $command->getDefinition()->addOption($option);
        }
        
        return $command;
    }
    
    public function argument($name, $mode = null, $description = '', $default = null)
    {
        return new InputArgument($name, $mode, $description, $default);
    }
    
    public function option($name, $shortcut = null, $mode = null, $description = '', $default = null)
    {
        return new InputOption($name, $shortcut, $mode, $description, $default);
    }
}