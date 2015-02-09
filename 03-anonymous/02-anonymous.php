<?php
/**
 * Closure
 */

$a = 'world';

$fcija = function() use ($a) {
    echo "Hello $a!\n";
};

//$a = 'Osijek';

$fcija();



/**
 * @reminder:
 * - mention observer/hook usage
 * 
 */