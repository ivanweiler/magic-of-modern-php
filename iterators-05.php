<?php
/**
 * ArrayIterator, ArrayObject
 */

$object = new ArrayIterator(array('one' => 1, 'two' => 2, 'three' => 3));
$object->d = 4;

foreach ($object as $key => $value) {
    echo "$key = $value\n";
}

echo $object['two'];
echo count($object);

//unset($object['two']);
$object->offsetUnset('two');

var_dump($object->getArrayCopy());


// ArrayObject

/**
 * class MyArrayIterator extends ArrayIterator{}
 */

