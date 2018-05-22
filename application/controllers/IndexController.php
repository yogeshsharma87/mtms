<?php
/**
* 
*/
class Mtms_Controller_IndexController extends Mtms_Controller
{
	public function indexAction()
	{
		$this->activeItem = 'index/index';
		$this->loginAction();
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

	public function livestreamAction()
	{
		$this->activeItem = 'index/livestream';
		if(Mtms_Model_SessionManager::getInstance()->isLoggedin())
			{
				require 'layout/livestream.php'; 
				die;
			}
		else
			{
				require 'layout/login.php'; 
				die;
			}
	}

	public function home()
	{
		$data = Mtms_Model_Navigation::getNav();
		print_r($data);
	}
}