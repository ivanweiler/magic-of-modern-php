<?php

header('Content-Type:text/plain');

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (version_compare(phpversion(), '5.5.0', '<') === true) {
    echo 'PHP >= 5.5.0 required';
    exit;
}

//helpers

function memory()
{
    return memory_get_usage(true) / 1024 . "\n";
}