<?php
/**
 * Built in iterators and practical samples
 */

$lines = file('../_data/demo.txt');
foreach($lines as $line) {
    //import line into db
}


$fileHandle = fopen('../_data/demo.txt', 'r');
while (false !== $line = fgets($fileHandle)) {
    //import line into db
}
fclose($fileHandle);







exit;


$fileIterator = new SplFileObject('../_data/demo.txt');
$regexIterator = new RegexIterator($fileIterator, '/^Lorem/');
$limitIterator = new LimitIterator($regexIterator, 0, 5);

foreach($limitIterator as $line) {
    var_dump($line);
}



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
