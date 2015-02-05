<?php

class MyIterator implements Iterator
{
    private $var = array();

    public function __construct($array)
    {
        $this->var = $array;
    }

    public function current()
    {
        $var = current($this->var);
        //echo "current: $var\n";
        return $var;
    }

    public function key()
    {
        $var = key($this->var);
        //echo "key: $var\n";
        return $var;
    }

    public function next()
    {
        $var = next($this->var);
        //echo "next: $var\n";
        return $var;
    }

    public function rewind()
    {
        //echo "rewind\n";
        reset($this->var);
    }

    public function valid()
    {
        $key = key($this->var);
        $var = ($key !== null && $key !== false);
        //echo "valid: $var\n";
        return $var;
    }
}

$object = new MyIterator(array(1,2,3));

foreach ($object as $key => $value) {
    echo "echo: $key => $value  \n";
}


/* $object->rewind();
while($object->valid()) {
    $key = $object->key();
    $value = $object->current();
    
    echo "echo: $key => $value  \n";
    
    $object->next();
} */


/**
 * @notes:
 * - iterator interface allows the object to dictate how it will be iterated
 *   and what values will be available on each iteration
 * - SeekableIterator here?
 */
