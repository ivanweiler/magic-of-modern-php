<?php

class MyClass
{
    public  $a = 1;
    public  $b = 2;
    private $c = 3;

    public function __construct()
    {
        //$this->d = 4;
    }

    public function fromInside()
    {
        foreach ($this as $key => $value) {
            echo "$key = $value\n";
        }
    }
}

$object = new MyClass();

foreach ($object as $key => $value) {
    echo "$key = $value\n";
}

echo $object['a'];


/**
 * @notes:
 * - which object can be used in a loop in php?
 * - by default, all visible properties will be used for the iteration
 */
