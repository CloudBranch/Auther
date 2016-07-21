<?php

	require_once 'config.php';
	require_once 'db.php';

		if(isset($_POST['create'])) {
			$email = $dbc->real_escape_string(trim($_POST['email']));
			$password1 = $dbc->real_escape_string(trim($_POST['password1']));
			$password2 = $dbc->real_escape_string(trim($_POST['password2']));

			if(!empty($email) && !empty($password1) && !empty($password2) && ($password1 === $password2)) {
				$query = "SELECT * FROM accounts WHERE email = '$email'";
				$data = $dbc->query($query);
				
				if(mysqli_num_rows($data) == 0) {
				
					$query = "INSERT INTO accounts (email, password, created_at) VALUES ('$email', '$password1', NOW())";
				
					$dbc->query($query);
					
					$query2 = "SELECT id, email FROM accounts WHERE email = '$email' AND password = '$password1'";
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
					echo '<p>An account already exists using this email.</p>';
				}
			}
			else {
				echo '<p>You must enter all of the data, including the desired password twice.</p>';
			}
		}
	
	$dbc->close();
	
?>