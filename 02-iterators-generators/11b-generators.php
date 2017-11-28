<?php

/**
 * Iterator vs. Generator example, read lines from file
 */

function lineGenerator($fileName) 
{
    if (!$fileHandle = fopen($fileName, 'r')) {
        throw new RuntimeException('Couldn\'t open file "' . $fileName . '"');
    }

    while (false !== $line = fgets($fileHandle)) {
        yield $line;
    }

    fclose($fileHandle);
}


class LineIterator implements Iterator 
{
    protected $fileHandle;

    protected $line;
    protected $i;

    public function __construct($fileName) {
        if (!$this->fileHandle = fopen($fileName, 'r')) {
            throw new RuntimeException('Couldn\'t open file "' . $fileName . '"');
        }
    }

    public function rewind() { }

    public function valid() {
        return false !== $this->line;
    }

    public function current() 
    {
        return $this->line;
    }

    public function key() 
    {
        return $this->i;
    }

    public function next() 
    {
        if (false !== $this->line) {
            $this->line = fgets($this->fileHandle);
            $this->i++;
        }
    }

    public function __destruct() 
    {
        fclose($this->fileHandle);
    }
}


