<?php

// Collection
class MyIteratorAggregate implements IteratorAggregate
{
    protected $_items = array(1, 2, 3);

    public function getIterator()
    {
        return new ArrayIterator($this->_items);
    }
}

$object = new MyIteratorAggregate();

foreach ($object as $key => $value) {
    echo "$key = $value\n";
}




/**
 * @reminder:
 * - alternative for implementing iterator
 * - better for lazy load?
 * - mention Collection
 * 
 */



