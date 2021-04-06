<?php
	session_start();

	require_once '../private/core/configuration.php';
	require_once '../private/core/app_functions.php';
	require_once '../private/core/db_functions.php';

	$database = require_once '../private/core/db_connection.php';
	
	$actionString = 'Global.home';
	
	if (isset($_GET['action']) and preg_match('/^[A-Z][a-z]+\.(?:[a-z][A-z0-9]+)+$/', $_GET['action'])) {
		$actionString = $_GET['action'];
	}
	
	list($group, $action) = explode('.', $actionString);

	$moduleDirectoryPath = '../private/application/modules/' . $group;

	#Check whether the requested module exists
	if (!file_exists($moduleDirectoryPath)) {
		die('FATAL APPLCIATION ERROR: The requested module does not exist!');
	}
	
	#Check whether the requested module group is a directory or not
	if (!is_dir($moduleDirectoryPath)) {
		die('FATAL APPLCIATION ERROR: The requested module direcotry does not exist!');
	}

	if (file_exists('../private/application/modules/' . $group . '/_before_all.php')) {
		require_once '../private/application/modules/' . $group . '/_before_all.php';
	}

	$actionFilePath = $moduleDirectoryPath . '/' . $action . '.php';
	
	#Check whether the requested action exists
	if (!file_exists($actionFilePath)) {
		die('FATAL APPLCIATION ERROR: The requested action does not exist!');
	}
	
	#Check whther the requested action is a file
	if (!is_file($actionFilePath)) {
		die('FATAL APPLCIATION ERROR: The requested action file does not exist!');
	}
	
	$DATA = require_once $actionFilePath;
	
	if (!is_array($DATA)) {
		$DATA = [];
	}

	$actionTemplatePath = '../private/application/templates/' . $group . '/' . $action . '.php';

	if (!file_exists($actionTemplatePath)) {
		die('FATAL APPLCIATION ERROR: The requested action template does not exist!');
	}

	if (!is_file($actionTemplatePath)) {
		die('FATAL APPLCIATION ERROR: The requested action template file does not exist!');
	}

	//Unset all the the variables that contain sensitive data like database connection, action etc.
	//For security purposes so they are not accessible from the template by the user
	/*
	unset($database);
 	unset($actionString);
 	unset($moduleDirectoryPath);
 	unset($group);
 	unset($action);
 	unset($actionFilePath);
	*/

	/*
	The following function isolates the template from the module
	so in the template we can use only the returned data by the $data variable.
	Any unnreturned data, will not be accessible from the template
	*/
	(function($DATA) use ($actionTemplatePath) {
		require_once $actionTemplatePath;
	})($DATA);
