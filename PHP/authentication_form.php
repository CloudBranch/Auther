<?php

	require 'session.php';
	include 'nav.php';
	
	if(isset($_SESSION['user_id'])) {
		
		header('location:http://localhost/blueprint/Blueprint/PHP/account.php');
		exit();
		
	}
	
?>

<p>Log In</p>
			
<form method="post" action="authenticate.php">
	<input type="email" placeholder="Email" name="email" />
	<input type="password" placeholder="Password" name="password" />
	<input type="submit" value="Log In" name="submit" />
</form>