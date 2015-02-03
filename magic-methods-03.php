<?php
/**
 * ActiveRecord example using magic methods
 *
 */
class Post
{
    public function __construct()
    {
        //PDO connect, set table
    }
    
    public function load($id)
    {
        
    }
    
    public function save()
    {
        
    }
    
    public function __set($name)
    {
        
    }
    
    public function __get($name)
    {
        
    }
    
    public function __call($name , $arguments)
    {
    
    }

}

$post = new Post;
$post->name = 'Test post 1';
$post->save();

$post
    ->load(1)
    ->setName('Test post 1')
    ->setContent('Lorem ipsum sit amet ..')
    ->save();


/**
 * @reminder:
 * - 
 */
