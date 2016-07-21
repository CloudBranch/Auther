<?php
	require_once "config.php";
	
	if(isset($_SESSION["id"])) {
		
		$_SESSION = array();
		
		if(isset($_COOKIE[session_name()])) {
			
			setcookie(session_name(), "",  time() - $lifetime, $cookieParams["path"], $cookieParams["domain"], $cookieParams["secure"], $cookieParams["httponly"]);
		}
		
		session_destroy();
	}
	
	setcookie("user_id", "", time() - $lifetime, "/", "localhost", $secure, $httponly);

	header("Location:http://localhost/blueprint/Blueprint/PHP/index.php");
?>