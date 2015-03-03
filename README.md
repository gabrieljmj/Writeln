![](http://i.imgur.com/JDZP2vC.gif)
=======
[![Build Status](https://travis-ci.org/GabrielJMJ/Writeln.svg)](https://travis-ci.org/GabrielJMJ/Writeln)  [![License](https://img.shields.io/packagist/l/gabrieljmj/writeln.svg)](https://packagist.org/packages/gabrieljmj/writeln) [![Latest Unstable Version](https://img.shields.io/badge/unstable-dev--master-orange.svg)](https://packagist.org/packages/gabrieljmj/writeln) [![Total Downloads](https://img.shields.io/packagist/dt/gabrieljmj/should-php.svg)](https://packagist.org/packages/gabrieljmj/writeln) [![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/gabrieljmj/writeln.svg)](https://scrutinizer-ci.com/g/GabrielJMJ/Writeln/?branch=dev)

Fast and simple Symfony Console command creation

## Usage example
```php
#!/usr/bin/env php
<?php
require 'vendor/autoload.php';

use Gabrieljmj\Wwriteln\Wwriteln;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

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

$cl->run();
```
```console
$ bin hello Gabriel
Hello Gabriel

$ bin hello Gabriel -u
HELLO GABRIEL
```