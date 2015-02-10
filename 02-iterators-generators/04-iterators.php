<?php
/**
 * ArrayAccess
 */
class MyArrayAccess implements ArrayAccess
{
    private $items = array('one' => 1, 'two' => 2, 'three' => 3);
    
    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }
    
    public function offsetExists($offset) {
        return isset($this->items[$offset]);
    }
    
    public function offsetUnset($offset) {
        unset($this->items[$offset]);
    }
    
    public function offsetGet($offset) {
        return isset($this->items[$offset]) ? $this->items[$offset] : null;
    }    
}

$object = new MyArrayAccess();
echo $object['two'] . "\n";
echo $object->offsetGet('two') . "\n";

unset($object['two']);

/**
 * @reminder:
 * - show Countable
 * - is_array or is_object?
 */


