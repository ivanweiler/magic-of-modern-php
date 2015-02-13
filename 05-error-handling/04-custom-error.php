<?php
/**
 * Custom error page
 */


register_shutdown_function(function() {
    
    //echo 'Shutdown function executed';
    
    $error = error_get_last();
    
    //var_dump($error);
    
    if ($error && $error['type'] === E_ERROR) {
        // fatal error has occured
        ob_clean();
        
        
    }
        
});


ob_start();

echo "First output \n";
echo "Second output \n";

x();

echo '3 output';


/**
 * vecina aplikacija je u try catch-u
 * 
 * vecina aplikacija ne echo-a output do samog kraja
 * 
 * 
 */

