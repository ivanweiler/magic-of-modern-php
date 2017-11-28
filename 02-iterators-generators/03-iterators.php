<?php
/*
 * IteratorAggregate
 */

//@reminder: comment everything except class in included file :)
include '02-iterators.php';

class MyIteratorAggregate implements IteratorAggregate
{
    private $_items;

    public function __construct($items)
    {
        $this->_items = $items;
    }

    public function getIterator()
    {
        return new MyIterator($this->_items);
    }
}

$object = new MyIteratorAggregate([1, 2, 3]);

foreach ($object as $key => $value) {
    echo "$key = $value\n";
}

/**
 * @reminder:
 * - alternative for implementing iterator
 * - better for lazy load?
 * - mention and show Collection
 * 
 */



