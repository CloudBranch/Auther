<?php

	require_once 'session.php';
	
	if(isset($_SESSION["user_id"])) {
		
		$_SESSION = array();
		
		if(isset($_COOKIE[session_name()])) {
			
			setcookie(session_name(), '',  $past_time, $cookieParams['path'], $cookieParams['domain'], $secure, $httponly);
		}
		
		session_destroy();
		
	}

	header("Location:http://localhost/blueprint/Blueprint/PHP/index.php?logout=true");
	
?>