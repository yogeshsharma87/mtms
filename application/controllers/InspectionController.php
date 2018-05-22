<?php
/**
* 
*/
class Mtms_Controller_InspectionController extends Mtms_Controller
{
	public function indexAction()
	{
		$this->title = 'All Inspection';
		$this->activeItem = 'inspection/index';
		if(!Mtms_Model_SessionManager::getInstance()->isLoggedin())
		{
			header("Location: /index/login");
			die;
		}
		require 'layout/inspection.php'; 
		die;
	}

	public function loginAction()
	{
		if(Mtms_Model_SessionManager::getInstance()->isLoggedin())
			{
				require 'layout/index.php'; 
				die;
			}
		else
			{
				require 'layout/login.php'; 
				die;
			}
	}

	public function logoutAction()
	{
		unset(Mtms_Model_SessionManager::getInstance()->user);
		header("Location: /index/login");
	}

	public function loginpostAction()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(Mtms_Model_Auth::getInstance()->autheticate($username, $password)) {
			header("Location: /index/index");
		} else {
			header("Location: /index/login");
		}
	}

	public function home()
	{
		$data = Mtms_Model_Navigation::getNav();
		print_r($data);
	}

	public function getinfoAction()
	{
		$id = $_POST['id'];
		$data = R::getAll( 'SELECT * FROM inspection where id=?',[$id]);
		header('Content-Type: application/json');
		echo json_encode($data);
		die;
	}

	public function saveAction()
	{
		$formData = $_POST['form-data'];
		parse_str($formData,$data);
		if(empty($data['inspection-id'])) {
			$inspection = R::dispense( 'inspection' );
			$inspection->id=null;
			unset($inspection->id);
		} else {
			$id = $data['inspection-id'];
			$inspection = Mtms_Model_Inspection::getInstance()->load($id);
		}
	
		if(!empty($data['fk_supervisor']))
		$inspection->fk_supervisor = $data['fk_supervisor'];
	
		if(!empty($data['fk_technician']))
		$inspection->fk_technician = $data['fk_technician'];

		$inspection->status = $data['status'];
		R::store( $inspection );
		die;
	}

	public function deleteAction()
	{
		$id = $_POST['insid'];
		$inspection = Mtms_Model_Inspection::getInstance()->load($id);
		R::trash( $inspection );
		die;
	}
}