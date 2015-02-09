<?php
/**
 * IteratorAggregate using Generator
 * 
 */
class MyCollection implements IteratorAggregate, Countable
{
    protected $_items = array(1, 2, 3);

    public function getIterator()
    {
        return $this->_getGenerator();
    }
    
    protected function _getGenerator()
    {
        foreach($this->_items as $value) {
            yield $value;
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

