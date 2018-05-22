<?php
/**
* 
*/
class Mtms_Model_Inspection extends Mtms_Model
{
	function __construct()
	{
		$this->table = 'inspection';
	}

    public static function getInstance()
    {
        if (!(static::$_instance instanceof Mtms_Model_Inspection)) {
            static::$_instance = new Mtms_Model_Inspection();
        }

        return static::$_instance;
    }

	public function getInspectionById($id)
	{
		return R::getAll( 'SELECT * FROM inspection where id=?',[$id]);
	}

	public function load($id)
	{
		return R::load( 'inspection', $id);
	}

	public function getAllByPilotId($id, $active = false)
	{
		if($active) {
			return R::getAll( 'SELECT * FROM inspection where fk_technician=? AND status=0',[$id]);
		} else {
			return R::getAll( 'SELECT * FROM inspection where fk_technician=?',[$id]);
		}
	}

	public function getAllBySupervisorId($id)
	{
		return R::getAll( 'SELECT * FROM inspection where fk_supervisor=?',[$id]);
	}

	public function getByRegion($regionId)
	{
		return R::getAll( 'SELECT * FROM inspection where fk_region_id=?',[$regionId]);
	}

	public function getAllInspection()
	{
		return R::getAll( 'SELECT * FROM inspection');
	}

	public function getMyInspections()
	{

	}
}