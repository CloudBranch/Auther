<?php

	require 'session.php';
	require 'db.php';
	
	session_regenerate_id(true); // Regenerate the session_id to prevent a session fixation attack
	
	if(!isset($_SESSION['user_id'])) {

		// Check if the form was submitted
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

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
		else {
			
			header('location:http://localhost/blueprint/PHP/account.php');
			
		}
	}
	else {
		
		header('location:http://localhost/blueprint/PHP/index.php');

	}
	
	$dbc->close();
	
?>