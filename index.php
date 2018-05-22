<?php 
// Define application root path
defined('APPLICATION_ROOT') || define('APPLICATION_ROOT',__DIR__);

// Define application environment
defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

require_once realpath(APPLICATION_ROOT . '/vendor/autoload.php');
require_once("bootstrap.php");
$bootstrap = new Bootstrap();
$bootstrap->init();
?>