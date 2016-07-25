<?php

	require 'session.php';
	require 'db.php';

	$email = $dbc->real_escape_string(trim($_POST['email']));
	$password = $dbc->real_escape_string(trim($_POST['password']));

	if(!empty($email) && !empty($password)) {

		$sql = "SELECT id, email, password FROM accounts WHERE email = '$email'";
		$data = $dbc->query($sql);
		
		$row = $data->fetch_assoc();
		$saved_password = $row['password'];

		if($data->num_rows == 1 && password_verify($password, $saved_password) == true) {
			
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['email'] = $row['email'];
			header('location:http://localhost/blueprint/Blueprint/PHP/account.php');
			
		}
		else {
			
			echo 'You must enter a valid email and password combination.';
			
		}
	}
	else {
		
		echo 'You must enter your email and password to authenticate.';
		
	}
	
?>