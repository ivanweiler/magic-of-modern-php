<?php
clearstatcache(true);

set_include_path(__DIR__ . '/vendor');

function my_autoload($class_name) {
    //var_dump($class_name);
    $class_path = str_replace(array('_','\\'), DIRECTORY_SEPARATOR, $class_name) . '.php';
    include $class_path;
}

spl_autoload_register('my_autoload');

$a = new MyClass();



var_dump(spl_autoload_functions());

