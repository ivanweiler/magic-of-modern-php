<?php

class MagicDemo
{
    public function __construct()
    {}
    
    public function __destruct()
    {
        echo 'destruct';
    }
    
    public function __call($name , $arguments)
    {
        
    }
}

$object = new MagicDemo();

//$object->nonExistingMethod();
