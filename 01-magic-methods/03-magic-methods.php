<?php
/**
 * Data container
 */
class Post
{
    private $_data = array();
    
    public function __set($name, $value) 
    {
        $this->_data[$name] = $value;
    }
    
    public function __get($name) 
    {
        return isset($this->_data[$name]) ? $this->_data[$name] : null;
    }
    
    public function __call($name , $arguments)
    {
        switch(substr($name, 0, 3)) {
            case 'set': 
                $this->__set(substr($name, 3), $arguments[0]);
                return $this;
                break;
            case 'get':
                return $this->__get(substr($name, 3));
                break;
            default:
                trigger_error("Call to undefined method " . __CLASS__ . "::$name()", E_USER_ERROR);
        }
    }
   
}


$post = new Post;
$post->name = 'Test post';
$post->description = 'Lorem ipsum sit amet ..';

var_dump($post);



// $post
//     ->setName('Test post 1')
//     ->setDescription('Lorem ipsum sit amet ..');

