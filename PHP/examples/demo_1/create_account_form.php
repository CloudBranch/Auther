<?php
	
	/**
	* @author Joshua Whalen
	*/
	
	require '../../session.php';
	
	if(isset($_SESSION['id'])) {
		
		header('location:http://localhost/Auther/PHP/examples/demo_1/account.php');
		exit();
		
	}
	
	$title = 'Create Account';
	
	include 'header.php';
	include 'nav.php';
	
?>

<p>Create Account</p>

<form method="post" action="http://localhost/Auther/PHP/examples/demo_1/create_account.php" autocomplete="stop">

	<label for="email">Email :</label>
	<input type="email" placeholder="Email" name="email" autocomplete="email" required>
	
	<br>
	
	<label for="password">Password :</label>
	<input type="password" placeholder="********" id="password" name="password1" pattern="(?=.*\d).{6,}" autocomplete="off" required>
	
	<br>
	
	<label for="verify_password">Verify Password :</label>
	<input type="password" placeholder="********" id="verify_password" name="password2" pattern="(?=.*\d).{6,}" autocomplete="off" required>
	
	<br>
	
	<input type="submit" value="Create" name="create">
		
</form>

<?php
	include 'footer.php';
?>