<?php
	
	/**
	* @author Joshua Whalen
	*/
	
	//Navigation to show if user is UNAUTHENTICATED
	if(!isset($_SESSION['id'])) {
		
		echo '<a href="index.php">Home</a> <a href="authentication_form.php">Log In</a> <a href="create_account_form.php">Create Account</a>';
		
	}
	//Navigation to show if user IS AUTHENTICATED
	else {
		
		echo '<a href="account.php">Home</a> <a href="logout.php">Log Out</a>';
		
	}
?>