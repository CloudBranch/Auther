<?php

	/**
	* @author Joshua Whalen <contact@joshuawhalen.com>
	*/
	
	// Database connection constants
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASSWORD", "");
	define("DB_NAME", "autherdb");
	define("DB_CHARSET", "UTF-8");
	define("DB_COLLATE", "");
	
	// Create database connection
	$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	// Test database connection
	if ($dbc->connect_error) {
		die('Connection failed: ' . $dbc->connect_error);
	}
	
?>