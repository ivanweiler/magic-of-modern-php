<?php
/**
 * Collection
 */

class MyCollection implements IteratorAggregate
{
    protected $_items = array(); 
    
    public function __construct($items = array())
    {
        $this->_items = $items;
    }
    
    public function getIterator() {
        return new ArrayIterator($this->_items);
    }
    
}


echo memory_get_usage(true)/1024 . "\n";
$object = new MyCollection(array_fill(0, 1024*1024, 1));
echo memory_get_usage(true)/1024 . "\n";

foreach($object as $key => $value) {
    echo memory_get_usage(true)/1024 . "\n";
    break;
}



exit;

echo memory_get_usage(true)/1024 . "\n";
$bigData = array_fill(0, 1024*1024, 1);
echo memory_get_usage(true)/1024 . "\n";

foreach($bigData as $key => $value) {
    echo memory_get_usage(true)/1024 . "\n";
    break;
}

exit;

$bigData = array_fill(0, 1024*1024, 1);
echo memory_get_usage(true)/1024 . "\n";
$object = new ArrayIterator($bigData);

foreach($object as $key => $value) {
    echo memory_get_usage(true)/1024 . "\n";
    break;
}


exit;

echo memory_get_usage(true)/1024 . "\n";
$a = array_fill(0, 1024*1024, 1);
$object = new MyIterator($a);
echo memory_get_usage(true)/1024 . "\n";
unset($a);

foreach($object as $key => $value) {
    echo memory_get_usage(true)/1024 . "\n";
    break;
}


