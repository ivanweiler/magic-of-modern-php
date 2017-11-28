<?php

class MagicDemo
{
    //private $a;
    
    public function __call($name , $arguments)
    {
        echo "call: $name \n"; 
        var_dump($arguments);
    }
    
    public function __set($name, $value)
    {
        echo "setter: $name => $value  \n";
    }
    
    public function __get($name)
    {
        echo "getter: $name  \n";
    }

}

$object = new MagicDemo();
$object->nonExistingMethod('one','two','three');

/*
$object->a = 1;
echo $object->b;
MagicDemo::nonExistingStaticMethod();
*/


/**
 * @reminder:
 * - rest api example
 * - show __callStatic
 * - __isset(), __unset()
 */


/*
//performance test, existing vs non-existing
$start = microtime(true);
for($i=0; $i<=1000000; $i++) {
    $object->nonExistingMethod();
}
echo microtime(true) - $start;
*/
