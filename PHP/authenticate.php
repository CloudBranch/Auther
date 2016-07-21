<?php

	require_once 'config.php';
	require_once 'db.php';

	$email = $dbc->real_escape_string(trim($_POST['email']));
	$password = $dbc->real_escape_string(trim($_POST['password']));

	if(!empty($email) && !empty($password)) {

		$query = "SELECT id, email FROM accounts WHERE email = '$email' AND password = '$password'";
		$data = $dbc->query($query);

		if(mysqli_num_rows($data) == 1) {
			$row = mysqli_fetch_array($data);
			$_SESSION['id'] = $row['id'];
			$user_id_rd = $row['id'];
			$_SESSION['email'] = $row['email'];
			$user_email_rd = $row['email'];
			setcookie('user_id', $row['user_id'], $time, '/', 'localhost', $secure, $httponly);
			header('location:http://localhost/blueprint/Blueprint/PHP/account.php?id=' . $user_id_rd . '&email=' . $user_email_rd);
		}
		else {
			echo 'Sorry, you must enter a valid email and password to log in.';
		}
	}
	else {
		echo 'Sorry, you must enter your email and password to log in.';
	}
?>					

