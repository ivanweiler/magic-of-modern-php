<?php
clearstatcache(true);

set_include_path(__DIR__ . '/vendor');

//use default autoload implementation
spl_autoload_extensions('.php');
spl_autoload_register();

$a = new MyClass();

