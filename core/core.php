<?php

// First, load up the necessary classes
require_once 'controller.php';
require_once 'db.php';
require_once 'load.php';

// Work out which controller and method to run.
if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '/')
{
	$path = substr($_SERVER['PATH_INFO'], 1);
	$parts = explode('/', $path);
	
	$controller = $parts[0];
	$method = empty($parts[1]) ? 'index' : $parts[1];
	
	unset($parts[0], $parts[1]);
	$parts = array_filter($parts);
	
	$args = empty($parts) ? array() : $parts;
}
else
{
	$controller = Config::get('default_controller');
	$method = 'index';
	$args = array();
}

// Check if $method starts with an _ - if so throw an exception
if (strpos($method, '_') === 0)
{
	die('Method not found');
}

// Add the request type to the method name
$method = strtolower($_SERVER['REQUEST_METHOD']).'_'.$method;

$controller_location = 'application/controllers/'.$controller.'.php';
if (file_exists($controller_location))
{
	require_once 'application/controllers/'.$controller.'.php';	
}
else
{
	die('Controller not found.');
}

// Make the controller name in the correct format
$controller = 'Controller_'.ucfirst($controller);
$c = new $controller;

if (!is_callable(array($c, $method)))
{
	die('Method not found.');
}

// Call the controller & method. Done!
call_user_func_array(array($c, $method), $args);