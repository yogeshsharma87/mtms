<?php 
/*require 'lib/rb.php';*/
class Bootstrap {
	const ENV = 'dev';
	private $config;
	public static $publicConfig;
	private static $db;
	
	protected function initSession()
	{
		Mtms_Model_SessionManager::init();
	}

	protected function config()
	{
		$fullConfig = parse_ini_file(__DIR__.DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."config.ini",true);
		$this->config = $fullConfig[self::ENV];
		//self::publicConfig = parse_ini_file(__DIR__.DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."config.ini",true);
	}
	
	protected function initDb()
	{
		self::$db = R::setup(
			'mysql:host=localhost;dbname='. $this->config['db.database'],
			$this->config['db.username'],
			$this->config['db.password'] );
	}

	public function getDbAdapter()
	{
		return self::$db;
	}

	public function init()
	{
		class_alias('\RedBeanPHP\R','\R');
		$methods = get_class_methods($this);
		foreach ($methods as $method) {
			if($method!= 'init') {
				$this->$method();
			}
		}

		$requestUrl = $_SERVER['REQUEST_URI'];
		$urlParams = explode('/', $requestUrl);
		$urlParams = array_filter($urlParams);
		
		$controllerName = 'Mtms_Controller_'.ucfirst(array_shift($urlParams)).'Controller';
		$actionName = strtolower(array_shift($urlParams)).'Action';
		
		if(class_exists($controllerName) && in_array($actionName,get_class_methods($controllerName)))
		{	
			$controller = new $controllerName;
			$controller->$actionName();
		} else {
			header("Location: /index/index");
		}
	}
}