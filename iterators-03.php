<?php

// Collection
class MyIteratorAggregate implements IteratorAggregate //, Countable
{
    protected $_items = array(1, 2, 3);

    public function getIterator()
    {
        return new ArrayIterator($this->_items);
    }
    
    public function count()
    {
        return count($this->_items);
    }
}

$object = new MyIteratorAggregate();

foreach ($object as $key => $value) {
    echo "$key = $value\n";
}

echo $object[2]; //error


/**
 * The IteratorAggregate interface can be used as an alternative to implementing all of the Iterator methods.
 *
 * IteratorAggregate only requires the implementation of a single method, IteratorAggregate::getIterator(),
 * which should return an instance of a class implementing Iterator.
 * 
 * better for lazy load?
 * 
 */



