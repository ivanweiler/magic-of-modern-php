<?php

if(PHP_SAPI != 'cli') {
    header('Content-Type:text/plain');
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (version_compare(phpversion(), '5.5.0', '<') === true) {
    echo 'PHP >= 5.5.0 required';
    exit;
}

//helpers

function memory($fromLastTime = false)
{
    static $lastMemory = 0;
    
    $currentMemory = memory_get_usage(true);
    
    if($fromLastTime) {
        echo ($currentMemory - $lastMemory) / 1024 . "\n";
    } else {
        echo $currentMemory / 1024 . "\n";
    }
    
    $lastMemory = $currentMemory;
}