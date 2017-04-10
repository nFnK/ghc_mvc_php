<?php 

require 'config.php';
require 'util/Auth.php';
//spl_autoload_register
function __autoload($class) {
	require LIBS.$class.'.php';
	//require 'libs/Form/Validator.php';
} 

//require LIBS.'Form/Validator.php';

$bootstrap = new Bootstrap();
//$bootstrap->setControllerPath();
//$bootstrap->setModelPath();
//$bootstrap->setDefaultFile('');
//$bootstrap->setErrorFile('');
$bootstrap->init();