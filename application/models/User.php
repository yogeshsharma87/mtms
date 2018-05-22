<?php
/**
* 
*/
class Mtms_Model_User extends Mtms_Model
{
	const PILOT_ROLE_ID = '3';
	const SUPERVISOR_ROLE_ID = '4';
	function __construct()
	{
		$this->table = 'inspection';
	}

    public static function getInstance()
    {
        if (!(static::$_instance instanceof Mtms_Model_User)) {
            static::$_instance = new Mtms_Model_User();
        }

        return static::$_instance;
    }

	public function getAllSupervisor()
	{
		return R::getAll( 'SELECT id,name FROM user where role_id=?',[self::SUPERVISOR_ROLE_ID]);
	}

	public function getAllPilots()
	{
		return R::getAll( 'SELECT id,name FROM user where role_id=?',[self::PILOT_ROLE_ID]);
	}
}