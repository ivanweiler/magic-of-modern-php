<?php
class MagicDemo
{
    public function __toString()
    {
        return ':]';
    }
}

$object = new MagicDemo();





/**
 * @reminder:
 * - __sleep(), __wakeup() 
 * - __invoke()
 * - __set_state(), __debugInfo()
 * 
 * - mention Magic constants
 */



// class View
// {
//     public function render($file, $vars)
//     {
//         extract($vars);
//         include 'view.phtml';
//     }

//     public function __toString()
//     {
//         return $this->render();
//     }
// }

// $view = new View;
// echo $view;