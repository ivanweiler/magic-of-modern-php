<?php

class MyIterator implements Iterator
{
    private $items = array();

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function current()
    {
        echo "current \n";
        return current($this->items);
    }

    public function key()
    {
        echo "key \n";
        return key($this->items);
    }

    public function next()
    {
        echo "next \n";
        return next($this->items);
    }

    public function rewind()
    {
        echo "rewind\n";
        reset($this->items);
    }

    public function valid()
    {
        $key = key($this->items);
        echo "valid \n";
        return ($key !== null && $key !== false);
    }
}

$object = new MyIterator(array(1,2,3));

foreach ($object as $key => $value) {
    echo "$key => $value  \n";
}


/* $object->rewind();
while($object->valid()) {
    $key = $object->key();
    $value = $object->current();
    
    echo "$key => $value  \n";
    
    $object->next();
} */



/**
 * @reminder:
 * - iterator interface allows object to dictate how it will be iterated
 *   and what values will be available on each iteration
 * - show interface, mention Traversable
 * - mention SeekableIterator
 */

