<?php
/**
 * Custom exception handler
 */
function my_exception_handler($exception) {
    echo "My exception: " , $exception->getMessage(), "\n";
}

set_exception_handler('my_exception_handler');


throw new Exception('this should never happen');
echo "Not Executed\n";

