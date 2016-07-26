<?php

	// Check if the form was submitted
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

		require 'session.php';
		require 'db.php';

		$email = $dbc->real_escape_string(trim($_POST['email']));
		$password = $dbc->real_escape_string(trim($_POST['password']));

		if(!empty($email) && !empty($password)) {
			
			// Prepared statement
			$stmt = $dbc->prepare('SELECT id, email, password FROM accounts WHERE email = ?');
			$stmt->bind_param('s', $email);
			
			$email = $email;
			$stmt->execute();
			$data = $stmt->get_result();
			
			$row = $data->fetch_assoc();
			$saved_password = $row['password'];

			if($data->num_rows == 1 && password_verify($password, $saved_password) == true) {
				
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['email'] = $row['email'];
				header('location:http://localhost/blueprint/PHP/account.php');
				
			}
			else {
				
				echo 'You must enter a valid email and password combination.';
				
			}
		}
		else {
			
			echo 'You must enter your email and password to authenticate.';
			
		}
	}
	
?>