<?php
/**
* 
*/
class Mtms_Model_Region extends Mtms_Model
{
    public static function getInstance()
    {
        if (!(static::$_instance instanceof Mtms_Model_Region)) {
            static::$_instance = new Mtms_Model_Region();
        }

        return static::$_instance;
    }

	public function getAllRegions()
	{
		return R::getAll( 'SELECT id,name FROM region');
	}
}