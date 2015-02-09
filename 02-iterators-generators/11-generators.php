<?php

/**
 * Iterator vs.
 * Generator example
 */








exit;



$conn = new PDO('mysql:host=localhost;dbname=magic_demo_1', 'root', '');

// for($i = 1; $i <=10000; $i++) {
//     $conn->query("INSERT INTO magic_demo_1.demo (id, name, content) VALUES (NULL, 'Name $i', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quam risus, placerat sit amet nulla in, rutrum sagittis est. Suspendisse sit amet ex fermentum quam vestibulum blandit sit amet sed ipsum. Morbi malesuada eleifend justo, ac tincidunt metus aliquam sit amet. Aenean semper sapien non dui sodales, eu tincidunt nisl dapibus. Praesent at massa nec augue elementum ullamcorper in vitae mauris. Morbi bibendum magna at ipsum mollis, eget rutrum nunc imperdiet. Fusce bibendum molestie diam eu dictum. Donec rhoncus augue vel magna auctor, a mattis erat vehicula. In vel mollis sapien.')");
// }

/* echo memory_get_usage(true) / 1024 . "\n";
$stmt = $conn->query("SELECT * FROM demo", PDO::FETCH_OBJ);
echo memory_get_usage(true) / 1024 . "\n";
$results = $stmt->fetchAll();
echo memory_get_usage(true) / 1024 . "\n"; */


/* echo memory_get_usage(true) / 1024 . "\n";
foreach ($conn->query("SELECT * FROM demo", PDO::FETCH_OBJ) as $row) {
    //var_dump($row);
    echo memory_get_usage(true) / 1024 . "\n";
}
echo memory_get_usage(true) / 1024 . "\n"; */


function getAllRows()
{
    global $conn;
    
    foreach ($conn->query("SELECT * FROM demo", PDO::FETCH_OBJ) as $row) {
        yield $row;
    }
    
    echo 'lol';
}


function limitRows($limit) {
    $i = 0;
    foreach(getAllRows() as $row) {
        yield $row;
        
        if(++$i == $limit) {
            break;
        }
    }
}


foreach(limitRows(3) as $row) {
    var_dump($row);
}



exit;


class MyIterator
{
}

function my_generator()
{}

//generator vs iterator


function lineGenerator($fileName) {
    if (!$fileHandle = fopen($fileName, 'r')) {
        throw new RuntimeException('Couldn\'t open file "' . $fileName . '"');
    }

    while (false !== $line = fgets($fileHandle)) {
        yield $line;
    }

    fclose($fileHandle);
}

// versus...

class LineIterator implements Iterator {
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

    public function current() {
        return $this->line;
    }

    public function key() {
        return $this->i;
    }

    public function next() {
        if (false !== $this->line) {
            $this->line = fgets($this->fileHandle);
            $this->i++;
        }
    }

    public function __destruct() {
        fclose($this->fileHandle);
    }
}

