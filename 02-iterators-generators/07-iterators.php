<?php
/**
 * Iterators data stream example
 */

//ini_set('memory_limit', '1M');

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
/////////////////////////////////////////////////////

$fileIterator = new SplFileObject('../_data/demo.txt');
foreach($fileIterator as $line) {
    //var_dump($line);
}





exit;
/////////////////////////////////////////////////////


// $regexIterator = new RegexIterator($fileIterator, '/^Lorem/');
// $limitIterator = new LimitIterator($regexIterator, 0, 5);

// foreach($limitIterator as $line) {
//     var_dump($line);
// }







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

/**
 * @reminder:
 * - iterators stream data
 * - csv to db import, log reader, db export, big collections, etc.
 * - http://php.net/manual/en/spl.iterators.php
 * 
 */
