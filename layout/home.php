<?php 
//require_once("session-check.php");
// Define application root path
defined('APPLICATION_ROOT')
    || define('APPLICATION_ROOT',__DIR__);

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

require_once realpath(APPLICATION_ROOT . '/../vendor/autoload.php');
require_once("bootstrap.php");
$bootstrap = new Bootstrap();
$bootstrap->init();
?>
<link rel="stylesheet" type="text/css" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="vendor/twbs/bootstrap/dist/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="vendor/twbs/bootstrap/dist/css/custom.css">
<script type="text/javascript" src="vendor/components/jquery/jquery.min.js"></script>
<script type="text/javascript" src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
