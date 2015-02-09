<?php

//ini_set('memory_limit', '1M');

//$bigData = range(1,1024*1024);

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
    echo "$value \n";
}

//is_object    
//get_class(generatorDemo(5));
