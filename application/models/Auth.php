<?php
/**
* 
*/
class Mtms_Model_Auth extends Mtms_Model
{
    public static function getInstance()
    {
        if (!(static::$_instance instanceof Mtms_Model_Auth)) {
            static::$_instance = new Mtms_Model_Auth();
        }

        return static::$_instance;
    }

    public function autheticate($un,$pw)
    {
        //print_r($un);
    	$user = R::getRow('SELECT * FROM user WHERE username LIKE ? LIMIT 1',[ "%$un%" ]);
        if(md5($pw) == $user['password'])
    	{
            Mtms_Model_SessionManager::getInstance()->user = $user;
            return true;
    	}
    	else
    	{
    		return false;
    	}
    }
}