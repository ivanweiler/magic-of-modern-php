<?php


$fcija = function () {
    echo "Hello World!\n";
};

$fcija();





exit;


$myArray = array(1, 2, 3);
array_walk($myArray, function (&$value) {
    $value = pow($value, 2);
});

var_dump($myArray);

//seperate function in variable


//var_dump($fcija);
//echo get_class($fcija); //Closure
//$fcija = new Closure();
