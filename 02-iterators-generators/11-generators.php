<?php
/**
 * Generators in practice
 */
//ini_set('memory_limit', '10M');

$conn = new PDO('mysql:host=localhost;dbname=magic_demo_1', 'magic', 'magic123');

echo memory_get_usage(true)/1024 . "\n";

$stmt = $conn->query("SELECT * FROM demo", PDO::FETCH_ASSOC);
$results = $stmt->fetchAll();

echo memory_get_usage(true)/1024 . "\n";


exit;

while($row = $stmt->fetch()) {
    var_dump($row);
}

echo memory_get_usage(true)/1024 . "\n";

exit;

//////////////////////////////////////////////


/**
 * Move fetch logic to function
 */

function getAllRecordsFromDb() {
    global $conn;
    
    foreach ($conn->query("SELECT * FROM demo", PDO::FETCH_OBJ) as $row) {
        yield $row;
    }
    
    echo 'close connection';
}

foreach(getAllRecordsFromDb() as $row) {
    var_dump($row);
}


exit;

/**
 * Generator chain
 */

function limitGenerator($generator, $limit) {
    $i = 0;
    foreach($generator as $row) {
        yield $row;
        
        if(++$i == $limit) {
            break;
        }
    }
}

foreach(limitGenerator(tableGenerator(), 5) as $row) {
    var_dump($row);
}





//fill table query
// for($i = 1; $i <=10000; $i++) {
//     $conn->query("INSERT INTO magic_demo_1.demo (id, name, content) VALUES (NULL, 'Name $i', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quam risus, placerat sit amet nulla in, rutrum sagittis est. Suspendisse sit amet ex fermentum quam vestibulum blandit sit amet sed ipsum. Morbi malesuada eleifend justo, ac tincidunt metus aliquam sit amet. Aenean semper sapien non dui sodales, eu tincidunt nisl dapibus. Praesent at massa nec augue elementum ullamcorper in vitae mauris. Morbi bibendum magna at ipsum mollis, eget rutrum nunc imperdiet. Fusce bibendum molestie diam eu dictum. Donec rhoncus augue vel magna auctor, a mattis erat vehicula. In vel mollis sapien.')");
// }
