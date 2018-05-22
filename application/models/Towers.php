<?php
/**
* 
*/
class Mtms_Model_Tower extends Mtms_Model
{
    public static function getInstance()
    {
        if (!(static::$_instance instanceof Mtms_Model_Tower)) {
            static::$_instance = new Mtms_Model_Tower();
        }

        return static::$_instance;
    }

	public function getAllTowers()
	{
		return R::getAll( 'SELECT id,area as name FROM tower');
	}
}