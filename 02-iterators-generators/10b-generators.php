<?php

function generatorExample() {
    $a = [1,2,3];
    foreach($a as $value) {
        //echo "yielding $value \n";
        yield $value;
    }
    //echo "done generator \n";
}

$generator = generatorExample();

echo $generator->current();
$generator->next();
echo $generator->current();
