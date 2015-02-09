<?php

$a = 'world';

$fcija = function() use ($a) {
    echo "Hello $a!\n";
};

//$a = 'Osijek';

$fcija();

/**
 * mention observer/hook usage
 * 
 */