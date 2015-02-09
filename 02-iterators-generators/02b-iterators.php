<?php

class MyIterator implements Iterator
{
    private $values = array();
    private $keys = array();
    private $pointer = 0;
    private $count = 0;

    public function __construct($items)
    {
        $this->pointer = 0;
        $this->count = count($items);
        
        $this->keys = array_keys($items);
        $this->values = array_values($items);
    }

    public function current()
    {
        return $this->values[$this->pointer];
    }

    public function key()
    {
        return $this->keys[$this->pointer];
    }

    public function next()
    {
        $this->pointer++;
        
        if($this->pointer < $this->count) {
            return $this->values[$this->pointer];
        } else {
            return false;
        }
    }

    public function rewind()
    {
        $this->pointer = 0;
    }

    public function valid()
    {
        return isset($this->keys[$this->pointer]);
    }
}

$object = new MyIterator(array('one' => 1, 'two' => 2, 'three' => 3));

foreach ($object as $key => $value) {
    echo "$key => $value  \n";
}


