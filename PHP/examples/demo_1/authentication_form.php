<?php
	
	/**
	* @author Joshua Whalen
	*/
	
	require '../../session.php';
	
	if(isset($_SESSION['id'])) {
		
		header('location:http://localhost/Auther/PHP/examples/demo_1/account.php');
		exit();
		
	}
	
	$title = 'Log In';
	
	include 'header.php';
	include 'nav.php';
	
?>

<p>Log In</p>
				
<form method="post" action="http://localhost/Auther/PHP/examples/demo_1/authenticate.php" autocomplete="stop">

	<label for="email">Email :</label>
	<input type="email" placeholder="e@mail.com" id="email" name="email" autocomplete="email" required>
	
	<br>
	
	<label for="password">Password :</label>
	<input type="password" placeholder="********" id="password" name="password" pattern="(?=.*\d).{6,}" autocomplete="off" required>
	
	<br>
	
	<input type="submit" value="Log In" name="login">
	
</form>
	
<?php
	include 'footer.php';
?>