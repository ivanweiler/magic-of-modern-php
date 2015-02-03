<?php
/**
 * Few built-in iterators (ArrayIterator, ArrayObject, SPL Itterators)
 */

$object = new ArrayIterator(array(1, 2, 3));
$object->d = 4;

foreach ($object as $key => $value) {
    echo "$key = $value\n";
}

echo $object[2]; 
echo count($object);

var_dump($object->getArrayCopy());


//tell about ArrayObject
//show Collection here?

exit;


$object = new ArrayObject(array('one' => 1, 'two' => 2, 'three' => 3));
$object->d = 4;

foreach ($object as $key => $value) {
    echo "$key = $value\n";
}

echo $object['two'];
echo count($object);
//unset($object[2]);

$object->offsetUnset('two');

var_dump($object);

foreach ($object as $key => $value) {
    echo "$key = $value\n";
}

// //test memory -> duplicated array here?


/**
 * class MyArrayIterator extends ArrayIterator{}
 */

