<?php
	require_once 'config.php';
	require_once 'nav.php';
	
	if(isset($_SESSION['user_id'])) {
		header('location:http://localhost/blueprint/Blueprint/PHP/account.php');
		exit();
	}
?>

<p>Create Account</p>
		
<form method="post" action="create_account.php">
			
	<input type="email" placeholder="Email" name="email" />
				
	<input type="password" placeholder="Password" name="password1" />
				
	<input type="password" placeholder="Verify Password" name="password2" />
				
	<input type="submit" value="Create" name="create" />
			
</form>