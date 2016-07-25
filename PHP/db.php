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
		die("Connection failed: " . $dbc->connect_error);
	}
	
	// CREATE ACCOUNT
	$stmt = $dbc->prepare("SELECT email FROM accounts WHERE email = ?");
	$stmt->bind_param("s", $email);
	
	$stmt2 = $dbc->prepare("INSERT INTO accounts (email, password, created_at) VALUES (?, ?, NOW())");
	$stmt2->bind_param("ss", $email, $password);
	
	$stmt3 = $dbc->prepare("SELECT id, email FROM accounts WHERE email = ?");
	$stmt3->bind_param("s", $email);
	
?>