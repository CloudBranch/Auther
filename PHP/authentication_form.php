<?php

	require 'session.php';
	
	$title = 'Log In';
	
	include 'header.php';
	include 'nav.php';
	
	if(isset($_SESSION['user_id'])) {
		
		header('location:http://localhost/blueprint/PHP/account.php');
		exit();
		
	}
	
?>

<p>Log In</p>
				
<form method="post" action="authenticate.php">

	<label for="email">Email :</label>
	<input type="email" placeholder="e@mail.com" id="email" name="email" required>
	
	<br>
	
	<label for="password">Password :</label>
	<input type="password" placeholder="********" id="password" name="password" required>
	
	<br>
	
	<input type="submit" value="Log In" name="login">
	
</form>
	
<?php
	include 'footer.php';
?>