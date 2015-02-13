<?php
/**
 * Custom shutdown function
 */
function shutdown()
{
    echo 'Shutdown function executed';
}
register_shutdown_function('shutdown');

//die();
echo "Hello world \n";
//x();


/**
 * executes on php timeout
 */
