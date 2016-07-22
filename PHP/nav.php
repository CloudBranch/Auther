<?php

	//Not Authenticated

	if(!isset($_SESSION['user_id'])) {
	
?>

		<a href="index.php">Home</a>
		<a href="authentication_form.php">Log In</a>
		<a href="create_account_form.php">Create Account</a>
		
		<br>
	
<?php
	
	}
	else {
	
	//Authenticated
?>

		<a href="account.php">Home</a>
		<a href="logout.php">Log Out</a>
		
		<br>
	
<?php 
	}
?>