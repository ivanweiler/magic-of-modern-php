<?php

class MyClass
{
    public  $a = 1;
    public  $b = 2;
    private $c = 3;

    public function __construct()
    {
        $this->d = 4;
    }

}

$object = new MyClass();

foreach ($object as $key => $value) {
    echo "$key = $value\n";
}

//echo $object['a'];

/**
 * @reminder:
 * - which object can be used in a loop in php?
 * 
 */
