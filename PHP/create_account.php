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
					
					$query = "SELECT * FROM accounts WHERE email = '$email'";
					$data = $dbc->query($query);
					
					if(mysqli_num_rows($data) == 0) {
					
						$query = "INSERT INTO accounts (email, password, created_at) VALUES ('$email', '$password_hash', NOW())";
						$dbc->query($query);
						
						$query2 = "SELECT id, email FROM accounts WHERE email = '$email'";
						$data2 = $dbc->query($query2);

						if(mysqli_num_rows($data2) == 1) {
							$row = mysqli_fetch_array($data2);
							$_SESSION['id'] = $row['id'];
							$user_id_rd = $row['id'];
							$_SESSION['email'] = $row['email'];
							$user_email_rd = $row['email'];
							setcookie('user_id', $row['user_id'], $time, '/', 'localhost', $secure, $httponly);
							header('location:http://localhost/blueprint/Blueprint/PHP/account.php?id=' . $user_id_rd . '&email=' . $user_email_rd);
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
	
	$dbc->close();
	
?>