<?php
// Set the basepath
define(BASEPATH, $_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']);

// Load the config class
require_once 'core/config.php';

// Set some config variables
Config::set('default_controller','welcome');

// Load up the core
require_once 'core/core.php';