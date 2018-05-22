<?php

class Mtms_Model_SessionManager extends Mtms_Model
{
	protected static $_instance;
	private $data;

    public static function getInstance()
    {
        if (!(static::$_instance instanceof Mtms_Model_SessionManager)) {
            static::$_instance = new Mtms_Model_SessionManager();
        }

        return static::$_instance;
    }

	function __construct()
	{
		//session_start();
	}

	public static function init()
	{
		session_start();
	}

    public function __get($varName){
 
        if (!array_key_exists($varName,$_SESSION)){
            //this attribute is not defined!
            return false;
        }
        else return $_SESSION[$varName];
 
    }

    public function __set($varName,$value){
        $_SESSION[$varName] = $value;
    }
    
    public function __unset($name)
    {
        unset($_SESSION[$name]);
    }
    
    public function isLoggedin()
    {
        if(!isset($_SESSION['user']))
            return false;
        else
            return true;
    }
}