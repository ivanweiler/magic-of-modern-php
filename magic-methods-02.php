<?php
/**
 * Magic __call example
 *
 */
class MagicDemo
{
    public function __construct()
    {}
    
    public function __call($name , $arguments)
    {
        
    }
    
    public function __get()
    {
        
    }
}

$object = new MagicDemo();

//$object->nonExistingMethod();
