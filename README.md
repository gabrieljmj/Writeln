Wirteln
=======


Usage example
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