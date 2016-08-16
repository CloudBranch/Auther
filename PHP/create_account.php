<?php

	/**
	* @author Joshua Whalen <contact@joshuawhalen.com>
	*/

	require 'session.php';
	
	session_regenerate_id(true); // Regenerate the session_id to help prevent a session fixation attack
	
	if(!isset($_SESSION['id'])) {
	
		// Check if the form was submitted
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {
			
			require 'db.php';
			
			// Prepared statements
			$stmt = $dbc->prepare('SELECT email FROM accounts WHERE email = ?');
			$stmt->bind_param('s', $email);
				
			$stmt2 = $dbc->prepare('INSERT INTO accounts (email, password, created_at) VALUES (?, ?, NOW())');
			$stmt2->bind_param('ss', $email, $password);
				
			$stmt3 = $dbc->prepare('SELECT id, email FROM accounts WHERE email = ?');
			$stmt3->bind_param('s', $email);
				
			$options = [
			
				'cost' => 10
				
			];

			$email = $dbc->real_escape_string(trim($_POST['email']));
			$password1 = $dbc->real_escape_string(trim($_POST['password1']));
			$password2 = $dbc->real_escape_string(trim($_POST['password2']));
			$password_hash = password_hash($password1, PASSWORD_BCRYPT, $options);
			$pw_length = strlen(utf8_decode($password1));

			if(!empty($email) && !empty($password1) && !empty($password2)) {
				
				// Check if passwords are identical and of proper length
				if($password1 === $password2 && $pw_length >= 6 && $pw_length <= 60) {
						
					$email = $email;
					$stmt->execute();
					$data = $stmt->get_result();
					
					if($data->num_rows == 0) {
							
						$email = $email;
						$password = $password_hash;
						$stmt2->execute();
						
						$email = $email;
						$stmt3->execute();
						$data2 = $stmt3->get_result();
						
						if($data2->num_rows == 1) {
							
							$row = $data2->fetch_assoc();
							$_SESSION['id'] = $row['id'];
							$_SESSION['email'] = $row['email'];
							header('location:http://localhost/Auther/PHP/account.php?created=true');
							
						}
					}
					else {
						
						echo 'An account already exists using this email.';
						
					}
				}
				else {
					
					echo 'Passwords must match, and the length must be between 6 and 60 characters.';
					
				}
			}
			else {
				
				echo 'You must populate all fields.';
				
			}
			
			$stmt->close();
			
		}
		else {
			
			header('location:http://localhost/Auther/PHP/account.php');
			
		}
	}
	else {
		
		header('location:http://localhost/Auther/PHP/index.php');

	}
	
	$dbc->close();
	
?>