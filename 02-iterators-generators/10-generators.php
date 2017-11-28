<?php

function generatorExample() {
    $a = [1,2,3];
    foreach($a as $value) {
        //echo "yielding $value \n";
        yield $value;
    }
    //echo "done generator \n";
}

foreach(generatorExample() as $value) {
    echo "$value \n";
}

//echo "done main \n";

//echo gettype(generatorExample());
//echo get_class(generatorExample());

//new \Generator();
