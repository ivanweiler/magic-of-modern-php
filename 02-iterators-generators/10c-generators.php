<?php
/**
 * Ready for Async :)
 */
function printer() {
    echo "I'm printer!".PHP_EOL;
    while (true) {
        $string = yield;
        echo $string.PHP_EOL;
    }
}

$printer = printer();
$printer->send('Hello world!');
echo 'Something in between!'.PHP_EOL;
$printer->send('Bye world!');


