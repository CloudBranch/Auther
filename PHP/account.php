<?php

	require_once 'config.php';

	if(isset($_SESSION['user_id'])) {
		
		require_once 'nav.php';
		
		echo "Welcome, " . $_SESSION["email"];
	}
	else {
		
		header('location:http://localhost/blueprint/Blueprint/PHP/index.php');
		exit();
	
	}

?>