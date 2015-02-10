<?php
/**
 * Strange JS-like AnonObject example
 *
 */
class MyAnonObject
{
    private $_methods = array();
    
    public function addMethod($name, Closure $callback)
    {
        $this->_methods[$name] = Closure::bind($callback, $this, get_class());
    }
    
    public function __call($name, array $args)
    {
        if (isset($this->_methods[$name])) {
            return call_user_func_array($this->_methods[$name], $args);
        }

        trigger_error("Call to undefined method " . __CLASS__ . "::$name()", E_USER_ERROR);
        
    }
}


$object = new MyAnonObject();
$object->nonExistingMethod();


// $object->addMethod('nonExistingMethod', function() {
//     echo get_class($this);
// });
