<?php

	require_once 'session.php';
	require_once 'db.php';

	if(isset($_POST['create'])) {
			
		$options = [
			'cost' => 10,
		];
		
		$email = $dbc->real_escape_string(trim($_POST['email']));
		$password1 = $dbc->real_escape_string(trim($_POST['password1']));
		$password2 = $dbc->real_escape_string(trim($_POST['password2']));
		$password_hash = password_hash($password1, PASSWORD_BCRYPT, $options);
		$pw_length = strlen(utf8_decode($password1));

		if(!empty($email) && !empty($password1) && !empty($password2)) {
				
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
						$_SESSION['user_id'] = $row['id'];
						$_SESSION['email'] = $row['email'];
						header('location:http://localhost/blueprint/Blueprint/PHP/account.php');
						
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
	}
		
	$stmt->close();
	$dbc->close();
	
?>