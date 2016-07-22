<?php

	require_once 'config.php';
	require_once 'db.php';

	$email = $dbc->real_escape_string(trim($_POST['email']));
	$password = $dbc->real_escape_string(trim($_POST['password']));

	if(!empty($email) && !empty($password)) {

		$sql = "SELECT id, email, password FROM accounts WHERE email = '$email'";
		$data = $dbc->query($sql);
		
		$row = $data->fetch_assoc();
		$saved_password = $row['password'];

		if(mysqli_num_rows($data) == 1 && password_verify($password, $saved_password) == true) {
			
			$_SESSION['user_id'] = $row['id'];
			$user_id_rd = $row['id'];
			$_SESSION['email'] = $row['email'];
			$user_email_rd = $row['email'];
			setcookie('user_id', $row['id'], $time, '/', 'localhost', $secure, $httponly);
			header('location:http://localhost/blueprint/Blueprint/PHP/account.php?user_id=' . $user_id_rd . '&email=' . $user_email_rd);
			
		}
		else {
			
			echo 'You must enter a valid email and password combination.';
			
		}
	}
	else {
		
		echo 'You must enter your email and password to authenticate.';
		
	}
	
?>