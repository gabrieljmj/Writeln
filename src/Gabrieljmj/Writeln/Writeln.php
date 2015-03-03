<?php
/**
 * Writeln
 *
 * @author  Gabriel Jacinto <gamjj74@hotmail.com>
 * @license MIT
 * @link    https://github.com/GabrielJMJ/Writeln
*/

namespace Gabrieljmj\Writeln;
 
use Gabrieljmj\Writeln\Command;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
 
class Writeln extends Application
{
    /**
     * Creates a command
     *
     * @param string   $name
     * @param array    $arguments
     * @param array    $options
     * @param callable $callback
     */
    public function command($name, array $arguments, array $options, callable $callback)
    {
        $command = $this->createCommand($name, $arguments, $options);
        $command->setCallback($callback);
        $this->add($command);
    }
 
    /**
     * Creates the command instance
     *
     * @param string   $name
     * @param array    $arguments
     * @param array    $options
     * @return \Gabrieljmj\Writeln\Command
     */
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
    
    /**
     * Adds a command argument
     *
     * @param string       $name
     * @param integer|null $mode
     * @param string       $description
     * @param string|null  $default
     * @return \Symfony\Component\Console\Input\InputArgument
     */
    public function argument($name, $mode = null, $description = '', $default = null)
    {
        return new InputArgument($name, $mode, $description, $default);
    }
    
    /**
     * Adds a command option
     *
     * @param string       $name
     * @param string|null  $shortcut
     * @param integer|null $mode
     * @param string       $description
     * @param string|null  $default
     * @return \Symfony\Component\Console\Input\InputOption
     */
    public function option($name, $shortcut = null, $mode = null, $description = '', $default = null)
    {
        return new InputOption($name, $shortcut, $mode, $description, $default);
    }
}