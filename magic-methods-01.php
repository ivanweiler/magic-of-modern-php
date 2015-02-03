<?php

class MagicDemo
{
    public function __construct()
    {
        echo "it's alive!! \n";
    }
    
    public function __destruct()
    {
        echo "destruct(or) \n";
    }
    
//     public function __call($name , $arguments)
//     {
        
//     }
}

$object = new MagicDemo();
//$object->nonExistingMethod();

/**
 * @notes:
 * - mention lazy constructor logic
 * - introduce __call here
 * 
 */
