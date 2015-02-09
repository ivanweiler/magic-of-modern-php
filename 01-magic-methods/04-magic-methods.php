<?php
/**
 * Simple ActiveRecord example using magic methods
 * (really really BAD and UNSECURE example, for presentation purposes only)
 *
 */
class Post
{
    private $_conn;
    private $_table = 'posts';
   
    private $_data = array();
    
    public function __construct() 
    {
        $this->_conn = new PDO('mysql:host=localhost;dbname=magic_demo_1', 'root', '');
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
                $this->__set($this->_toSnakeCase(substr($name, 3)), $arguments[0]);
                return $this;
                break;
            case 'get':
                return $this->__get($this->_toSnakeCase(substr($name, 3)));
                break;
            default:
                trigger_error("Call to undefined method " . __CLASS__ . "::$name()", E_USER_ERROR);
        }
    }
    
    protected function _toSnakeCase($name)
    {
        return strtolower(preg_replace('/(.)([A-Z])/', "$1_$2", $name));
    }
    
    public function load($id)
    {
        $query = 'SELECT * FROM posts WHERE id = ?';
        
        $stmt = $this->_conn->prepare($query);
        $stmt->execute(array($id));
        
        $this->_data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $this;
    }
    
    public function save()
    {
        $tableColumns = $this->_conn->query("DESCRIBE posts")->fetchAll(PDO::FETCH_COLUMN);
        $validKeys = array_intersect(array_keys($this->_data), $tableColumns);
        
        $bind = array();
        
        if(!isset($this->_data['id'])) {
            
            $columns = implode(',', $validKeys);
            
            $values = array();
            foreach($validKeys as $key) {
                $values[] = '?';
                $bind[] = $this->_data[$key];
            }
            $values = implode(',', $values);
            
            $query = "INSERT INTO posts ($columns) VALUES ($values)";
            
            
        } else {
            
            $set = array();
            foreach($validKeys as $key) {
                $set[] = "$key = ?";
                $bind[] = $this->_data[$key];
            }
            $set = implode(',', $set);
            $bind[] = $this->_data['id'];
            
            $query = "UPDATE posts SET $set WHERE id = ?";
        }
        
        $this->_conn->prepare($query)->execute($bind);
        
        return $this;
    }

}

$post = new Post;
$post->name = 'Test post';
$post->description = 'Lorem ipsum sit amet ..';
$post->somethingelse = 'dummy';
$post->save();

$post
    ->load(1)
    ->setName('Test post 1')
    ->setDescription('Lorem ipsum sit amet ..')
    ->save();

/**
 * @reminder:
 * - show Laravel Eloquent example?
 */
