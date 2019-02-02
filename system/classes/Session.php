<?php defined('FRTCFTYU') or die('No direct script access.');

/*
 * Start up the application
 *
*/
class Session extends Singleton {
    
    private $_key;
    
    private $_td;
    
    private $_iv;
    
    private $_config;
    
    public function __construct()
    {
        $this->_config = Useracc::config('session');
        $this->_key = $this->_config['secretkey'];
        
        //Устанавливаем время жизни сессии. 
        //Если пользователь не активен, удаляем сессию через через назначенный срок.
        ini_set('session.cookie_lifetime', $this->_config['lifetime']);
        if ($this->_config['lifetime']) {
            ini_set('session.gc_maxlifetime', $this->_config['lifetime']);
        }
        if ( ! session_id() && session_start() ) {
            setcookie(session_name(), session_id(), time() + $this->_config['lifetime']);
        }

        //Установка модуля шифрования
        $this->_td = mcrypt_module_open('tripledes', '', 'ecb', '');
        $this->_iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($this->_td), MCRYPT_RAND);
        mcrypt_generic_init($this->_td, $this->_key, $this->_iv);
    }
    
    public function set($key, $value)
    {
        $_SESSION[$key] = mcrypt_generic($this->_td, $value);
    }
    
    public function get($key)
    {
        if(isset($_SESSION[$key])) {
            return mdecrypt_generic($this->_td, $_SESSION[$key]);
        }
        else {
            return null;
        }
    }
    
    public function del($key)
    {
        unset($_SESSION[$key]);
    }
    
    public function __destruct()
    {
        mcrypt_generic_deinit($this->_td);
        mcrypt_module_close($this->_td);
    }
}