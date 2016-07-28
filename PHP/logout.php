<?php

	require 'session.php';
	
	if(isset($_SESSION['user_id'])) {
		
		// Clear the session variables
		$_SESSION = array();
		
		// Delete the session cookie by setting it to time in the past if it's set
		if(isset($_COOKIE[session_name()])) {
			
			setcookie(session_name(), '',  1, $cookieParams['path'], $cookieParams['domain'], $secure, $httponly);
		}
		
		// Destroy the session
		session_unset();
		session_destroy();
		
	}
	
	// Redirect to landing page
	header('Location:http://localhost/blueprint/PHP/index.php?logout=true');
	
?>