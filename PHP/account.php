<?php

	require_once 'nav.php';

	if(!isset($_SESSION['email'])) {
		header('location:http://localhost/blueprint/Blueprint/PHP/index.php');
		exit();
	}
	
	echo "Welcome, " . $_SESSION["email"];

?>