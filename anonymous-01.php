<?php

$fcija = function () {
    echo "Hello World!\n";
};

$fcija();

var_dump($fcija);

//echo get_class($fcija); //Closure

$fcija = new Closure();


//array_walk

