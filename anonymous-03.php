<?php
class Test
{
    private $_anon;
    
    private $_a = 1;
    
    public function __construct()
    {
        $this->_anon = function() {
            var_dump(get_class($this));
            //echo $this->_a;
        };
    }
    
    public function callAnon()
    {
        $temp = $this->_anon;
        $temp();
    }
}

$object = new Test();
$object->callAnon();



// $anon2 = function() {
//     var_dump($this);
// };
// $anon2 = Closure::bind($anon2, $object);
// $anon2();


//$anon2 = $anon2->bindTo($object);




