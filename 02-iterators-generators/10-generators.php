<?php
//ini_set('memory_limit', '10M');

/**
 * generate and display X random numbers
 */

function generateRand($howMany) {
    $randoms = array();
    for($i = 1; $i <= $howMany; $i++) {
        $randoms[] = rand();
    }
    return $randoms;
}

foreach(generateRand(20) as $value) {
    echo "$value \n";
}


//echo gettype(generateRand(20));









exit;

// function generateRand($howMany) {
//     for($i = 1; $i <= $howMany; $i++) {
//         yield rand();
//     }
// }

// foreach(generateRand(20) as $value) {
//     //echo memory_get_usage(true) / 1024; break;
//     echo "$value \n";
// }


//get_class(generateRand(5));


// $generatorInstance = generateRand(20);
// var_dump($generatorInstance);
// $i = 0;
// foreach($generatorInstance as $key => $value) {
//     var_dump($key);
//     $i++;
//     if($i == 10) break;
// }

// foreach($generatorInstance as $key => $value) {
//     var_dump($key);
// }

