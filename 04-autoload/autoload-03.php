<?php

set_include_path(__DIR__ . '/vendor');

function my_autoloader($class_name) {
    //var_dump($class_name);
    $class_path = str_replace(['_','\\'], DIRECTORY_SEPARATOR, $class_name) . '.php';
    //var_dump($class_path);
    include $class_path;
}

spl_autoload_register('my_autoloader');

$a = new MyClass();

//var_dump(class_exists('MyClass', true));
//var_dump(spl_autoload_functions());

/**
 * @reminder:
 * - show \Weiler\MyClass
 * - show anonymous version
 */