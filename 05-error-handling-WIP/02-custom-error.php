<?php
/**
 * Custom error handler
 */
function my_error_handler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) { //respect settings
        return;
    }

    switch ($errno) {
        case E_USER_ERROR:
            echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
            echo "  Fatal error on line $errline in file $errfile";
            echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
            echo "Aborting...<br />\n";
            exit(1);
            break;

        //case E_WARNING:
        case E_USER_WARNING:
            echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
            break;

        //case E_NOTICE:
        case E_USER_NOTICE:
            echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
            break;

        default:
            echo "<b>My Unknown error type</b>: [$errno] $errstr<br />\n";
            break;
    }

    /* Don't execute PHP internal error handler */
    return true;
}

set_error_handler('my_error_handler');

foreach('lol' as $value) {}

$a = array(1,2,3);
echo $a[66];




