<?php
/**
 * Iterators practical examples
 */

//list other built in iterators

// apache log reader example; native, SplFileObject

class ReverseSplFileObject extends SplFileObject
{
    private $pos = array();

    function current() {
        return trim(parent::current());
    }

    function next() {
        $this->eof() || $this->pos[] = $this->ftell();
        return parent::next();
    }

    function prev() {
        if (empty($this->pos)) {
            $this->fseek(0);
        } else {
            $this->fseek(array_pop($this->pos));
        }
        return $this->current();
    }
}


class TableExporter implements Iterator
{
    
    public function __construct($conn, $tableName) {
        
    }
    public function current () {
        
    }
    
    public function next () {
        
    }
    
    public function key () {
        
    }
    
    public function valid () {
        
    }
    
    public function rewind () {
        
    }
}

//new TableExporter($connection, 'table_name');

/**
 * @reminder:
 * - iterators stream data
 * 
 */
