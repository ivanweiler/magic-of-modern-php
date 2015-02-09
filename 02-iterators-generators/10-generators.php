<?php

ini_set('memory_limit', '10M');

function normalDemo($howMany)
{
    $randoms = array();
    for($i = 1; $i <= $howMany; $i++) {
        $randoms[] = rand();
    }
    return $randoms;
}

function generatorDemo($howMany)
{
    for($i = 1; $i <= $howMany; $i++) {
        yield rand();
    }    
}


foreach(normalDemo(100000) as $value) {
    echo "$value \n";
}


foreach(generatorDemo(100000) as $value) {
    //echo memory_get_usage(true) / 1024; break;
    echo "$value \n";
}

//is_object    
//get_class(generatorDemo(5));
