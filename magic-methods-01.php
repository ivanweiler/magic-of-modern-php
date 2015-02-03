<?php

class MagicDemo
{
    public function __construct()
    {
        echo "it's alive! \n";
    }
    
    public function __destruct()
    {
        echo "it is dead :( \n";
    }
}

$object = new MagicDemo();


// unset($object);
// echo "-----  \n";


/**
 * @notes:
 * - for what is __destruct usually used
 * - mention lazy constructor logic?
 * - introduce __call here?
 * 
 */
