<?php
/**
 * IteratorAggregate using Generator
 * 
 */
class MyCollection implements IteratorAggregate, Countable
{
    protected $_items = array('one' => 1, 'two' => 2, 'three' => 3);

    public function getIterator()
    {
        return $this->_getGenerator();
    }
    
    protected function _getGenerator()
    {
        foreach($this->_items as $key => $value) {
            yield $key => $value;
        }
    }
    
    public function count()
    {
        return count($this->_items);
    }
}

$object = new MyCollection();

foreach ($object as $key => $value) {
    echo "$key = $value\n";
}

