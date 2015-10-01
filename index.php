<?php
	error_reporting(E_ALL);
	define('DS', DIRECTORY_SEPARATOR);
	require_once('.'.DS.'app'.DS.'config'.DS.'bootstrap.php');
	
	$objRouter = new cRouter();
	
	$objRouter->fRouter();