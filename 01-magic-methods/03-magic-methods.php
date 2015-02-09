<?php
/**
 * ActiveRecord example using magic methods
 * (really really BAD example, do not use in any production, for presentation purposes only)
 *
 */
class Post // extends PDOStatement
{
    private $_table = 'post';
    private $_data = array();
    
    public function __construct() 
    {
        $this->_conn = new PDO('mysql:host=localhost;dbname=testdb', 'root', '');
    }
    
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
                return $this->__set(substr($name, 3), $argument[0]);
                break;
            case 'get':
                return $this->__get(substr($name, 3));
                break;
            default:
                trigger_error("Call to undefined method " . __CLASS__ . "::$name()", E_USER_ERROR);
        }
    }
    
    public function load($id)
    {
        $stmt = $this->_conn->prepare("SELECT * FROM {$this->_table} WHERE id = ?");
        $stmt->execute(array($id));
    
        $this->_data = $stmt->fetch($fetchMode);
    }
    
    public function save()
    {
        $keys = $this->_conn->query("DESCRIBE {$this->_table}")->fetchAll(PDO::FETCH_COLUMN);
        
        $columns = implode(',', array_keys($this->_data));
        
        
    
        if(isset($this->_data['id'])) {
            $stmt = $this->_conn->prepare("UPDATE {$this->_table} ($columns) VALUES (?) WHERE id = ?");
            $stmt->execute($this->_data, $this->_data['id']);
        } else {
            $stmt = $this->_conn->prepare("INSERT INTO {$this->_table} ($columns) VALUES (?) WHERE id = ?");
            $stmt->execute($this->_data, $this->_data['id']);
        }
    }

}

$post = new Post;
$post->name = 'Test post';
$post->description = 'Lorem ipsum sit amet ..';
$post->save();


// $post
//     ->load(1)
//     ->setName('Test post 1')
//     ->setDescription('Lorem ipsum sit amet ..')
//     ->save();

/**
 * @reminder:
 */
