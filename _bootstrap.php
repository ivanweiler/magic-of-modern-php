<?php

header('Content-Type:text/plain');

ini_set('display_errors', 1);
error_reporting(E_ALL);

//php version check
if (version_compare(phpversion(), '5.5.0', '<') === true) {
    echo 'PHP >= 5.5.0 required';
    exit;
}

function showMemory()
{
    return memory_get_usage(true) / 1024;
}