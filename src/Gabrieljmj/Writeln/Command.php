<?php
/**
 * Writeln
 *
 * @author  Gabriel Jacinto <gamjj74@hotmail.com>
 * @license MIT
 * @link    https://github.com/GabrielJMJ/Writeln
*/

namespace Gabrieljmj\Writeln;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends SymfonyCommand
{
    /**
     * Command execution
     *
     * @var callable
     */
    private $callback;
    
    /**
     * Sets the command execution
     *
     * @param callable $callback
     */
    public function setCallback(callable $callback)
    {
        $this->callback = $callback;
    }
    
    /**
     * Executes the command
     *
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        call_user_func($this->callback, $input, $output);
    }
}