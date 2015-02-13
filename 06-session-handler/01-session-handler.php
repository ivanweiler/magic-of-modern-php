<?php
/**
 * SessionHandler example
 * http://php.net/manual/en/class.sessionhandler.php
 */
class EncryptedSessionHandler extends SessionHandler
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function read($id)
    {
        $data = parent::read($id);
        return mcrypt_decrypt(MCRYPT_3DES, $this->key, $data, MCRYPT_MODE_ECB);
    }

    public function write($id, $data)
    {
        $data = mcrypt_encrypt(MCRYPT_3DES, $this->key, $data, MCRYPT_MODE_ECB);
        return parent::write($id, $data);
    }
}




$handler = new EncryptedSessionHandler('CodeCamp');
session_set_save_handler($handler, true);



session_start();

$_SESSION['group'] = 'CodeCamp';


