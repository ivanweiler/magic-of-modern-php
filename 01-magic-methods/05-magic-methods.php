<?php
class MagicDemo
{
    public function __toString()
    {
        return ':]';
    }
}

$object = new MagicDemo();

echo $object;



/**
 * @reminder:
 * - __sleep(), __wakeup() 
 * - __invoke()
 * - __set_state(), __debugInfo()
 * - mention Zend_Db_Select, Laravel_View
 * - mention Magic constants?
 */



/**
 * Basic View example
 *
 */
/* 
class View
{
    public function __construct($template) 
    {
        $this->template = $template;
    }
    public function render($vars = array())
    {
        extract($vars);
        include "../_data/{$this->template}";
    }

    public function __toString()
    {
        ob_start();
        $this->render();
        return ob_get_clean();
    }
}

$view = new View('demo.phtml');
echo $view; 
*/

