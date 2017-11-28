<?php

/**
 * Default autoloader
 */

set_include_path(__DIR__ . '/vendor');

//use default autoload implementation
spl_autoload_register();

$a = new MyClass();

/**
 * @reminder:
 * - rename /vendor/MyClass to lowercase; default autoloader lowercase file names
 * - same with namespaces, everything is lowercase
 */

