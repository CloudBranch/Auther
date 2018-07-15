<?php

	/**
	* @author Joshua Whalen <contact@joshuawhalen.com>
	*/

	/******************************************************
	-----------------------Navigation----------------------
	******************************************************/
	
	// Navigation to show if user is NOT AUTHENTICATED
	
	if(!isset($_SESSION['id'])) {
	
?>
		
	<a href="index.php">Home</a>
	<a href="authentication_form.php">Log In</a>
	<a href="create_account_form.php">Create Account</a>
	
<?php
	
	}
	// Navigation to show if user IS AUTHENTICATED
	else {
		
?>
		
	<a href="account.php">Home</a>
	<a href="../../logout.php">Log Out</a>
	
<?php

	}
?>