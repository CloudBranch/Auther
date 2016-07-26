<?php

	require 'session.php';

	if(isset($_SESSION['user_id'])) {
		
		$title = 'Home';
		
		include 'header.php';
		include 'nav.php';
		
		echo "Welcome, " . $_SESSION["email"];
		
		include 'footer.php';
		
	}
	else {
		
		header('location:http://localhost/blueprint/PHP/index.php');
		exit();
	
	}

?>