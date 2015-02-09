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
$object->nonExistingMethod(1,2,3);

// $object->a = 1;
// echo $object->b;
// MagicDemo::nonExistingStaticMethod();


/**
 * @reminder:
 * - rest api example
 * - shoe __callStatic
 * - __isset(), __unset()
 */
