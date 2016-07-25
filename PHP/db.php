<?php
	
	// Database connection constants
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASSWORD", "");
	define("DB_NAME", "auth");
	define("DB_CHARSET", "UTF-8");
	define("DB_COLLATE", "");
	
	// Database connection
	$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	// Test database connection
	if ($dbc->connect_error) {
		die('Connection failed: ' . $dbc->connect_error);
	}
	
?>