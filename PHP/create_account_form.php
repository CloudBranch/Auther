<?php
	
	require 'session.php';
	
	if(isset($_SESSION['user_id'])) {
		
		header('location:http://localhost/Auther/PHP/account.php');
		exit();
		
	}
	
	$title = 'Create Account';
	
	include 'header.php';
	include 'nav.php';
	
?>

<p>Create Account</p>

<form method="post" action="http://localhost/Auther/PHP/create_account.php">

	<label for="email">Email :</label>
	<input type="email" placeholder="Email" name="email" required>
	
	<br>
	
	<label for="password">Password :</label>
	<input type="password" placeholder="********" id="password" name="password1" pattern="(?=.*\d).{6,}" required>
	
	<br>
	
	<label for="verify_password">Password :</label>
	<input type="password" placeholder="********" id="verify_password" name="password2" pattern="(?=.*\d).{6,}" required>
	
	<br>
	
	<input type="submit" value="Create" name="create">
		
</form>

<?php
	include 'footer.php';
?>