<?php
/**
 * ArrayAccess
 */
class MyArrayAccess implements ArrayAccess
{
    private $container = array(
        'one'   => 1,
        'two'   => 2,
        'three' => 3,
    );
    
    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    
    public function offsetExists($offset) {
        return isset($this->container[$offset]);
    }
    
    public function offsetUnset($offset) {
        unset($this->container[$offset]);
    }
    
    public function offsetGet($offset) {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }    
}

$object = new MyArrayAccess();
echo $object['two'];
unset($object['two']);


/**
 * @notes:
 * - show Countable, SeekableIterator
 * - is_array, is_object
 */


