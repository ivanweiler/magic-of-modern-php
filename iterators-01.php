<?php
header('Content-Type:text/plain');

ini_set('display_errors', 1);
error_reporting(E_ALL);

/**
 * By default, all visible properties will be used for the iteration.
 */
class MyClass
{
    public  $a = 1;
    public  $b = 2;
    private $c = 3;

    public function __construct()
    {
        //$this->d = 4;
    }

    public function fromInside()
    {
        foreach ($this as $key => $value) {
            echo "$key = $value\n";
        }
    }
}

// $object = new MyClass();

// foreach ($object as $key => $value) {
//     echo "$key = $value\n";
// }

// echo $object['a'];

// exit;


/**
 * Iterator interface allows the object to dictate how it will be iterated
 * and what values will be available on each iteration
 */
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
        echo "current: $var\n";
        return $var;
    }

    public function key()
    {
        $var = key($this->var);
        echo "key: $var\n";
        return $var;
    }

    public function next()
    {
        $var = next($this->var);
        echo "next: $var\n";
        return $var;
    }

    public function rewind()
    {
        echo "rewind\n";
        reset($this->var);
    }

    public function valid()
    {
        $key = key($this->var);
        $var = ($key !== null && $key !== false);
        echo "valid: $var\n";
        return $var;
    }
}

// $it = new MyIterator(array(1,2,3));

// foreach ($it as $a => $b) {
//     echo "echo: $a => $b\n";
// }

// exit;

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

// $object = new MyArrayAccess();
// echo $object['two'];
// unset($object['two']);
// exit;


// ArrayIterator, ArrayObject, SPL Itterators


class MyArrayIterator extends ArrayIterator
{}

// $object = new MyArrayIterator(array(1, 2, 3));
// $object->d = 4;

// foreach ($object as $key => $value) {
//     echo "$key = $value\n";
// }

// foreach ($object as $key => $value) {
//     echo "$key = $value\n";
// }

// echo $object[2]; 
// echo count($object);

// var_dump($object->getArrayCopy());

// exit;





// $object = new ArrayObject(array('one' => 1, 'two' => 2, 'three' => 3));
// $object->d = 4;

// foreach ($object as $key => $value) {
//     echo "$key = $value\n";
// }

// echo $object['two'];
// echo count($object);
// //unset($object[2]);

// $object->offsetUnset('two');

// var_dump($object);

// foreach ($object as $key => $value) {
//     echo "$key = $value\n";
// }

// //test memory -> duplicated array here?

// exit;


/**
 * The IteratorAggregate interface can be used as an alternative to implementing all of the Iterator methods.
 *
 * IteratorAggregate only requires the implementation of a single method, IteratorAggregate::getIterator(),
 * which should return an instance of a class implementing Iterator.
 */

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

//is_array, is_object




