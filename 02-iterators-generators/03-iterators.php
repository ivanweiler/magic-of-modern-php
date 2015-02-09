<?php
/*
 * IteratorAggregate
 */

//@reminder: comment everiting except class in file :)
include '02-iterators.php';

class MyIteratorAggregate implements IteratorAggregate
{
    protected $_items = array(1, 2, 3);

    public function getIterator()
    {
        return new MyIterator($this->_items);
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



