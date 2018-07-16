<?php

	/**
	* @author Joshua Whalen
	*/

	class auther {
		
		// The addUser() method adds a new user to the database table specified
		public function addUser($email, $password) {
			
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
									header('location:http://localhost/Auther/PHP/examples/demo_1/account.php?created=true');
									
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
			
		}
		
		// The deleteUser() method deletes a user from the database table specified
		public function deleteUser() {
			
		}
		
		// The authenticate() method authorizes a user
		public function authenticate($email, $password) {
			
			require 'session.php';
			
			session_regenerate_id(true); // Regenerate the session_id to help prevent a session fixation attack
			
			if(!isset($_SESSION['id'])) {

				// Check if the form was submitted
				if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
					
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
							
							$_SESSION['id'] = $row['id'];
							$_SESSION['email'] = $row['email'];
							header('location:http://localhost/Auther/PHP/examples/demo_1/account.php');
							
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
					
					header('location:http://localhost/Auther/PHP/examples/demo_1/account.php');
					
				}
			}
			else {
				
				header('location:http://localhost/Auther/PHP/examples/demo_1/index.php');

			}
			
			$dbc->close();
			
		}
		
		// The unauthenticate() method unauthorizes a user
		public function unauthenticate() {
			
			require 'session.php';
			
			if(isset($_SESSION['id'])) {
				
				// Clear the session variables
				$_SESSION = array();
				
				// Delete the session cookie by setting it to time in the past if it's set
				if(isset($_COOKIE[session_name()])) {
					
					setcookie(session_name(), '',  1, $cookieParams['path'], $cookieParams['domain'], $secure, $httponly);
					
				}
				
				// Destroy the session
				session_unset();
				session_destroy();
				
			}
			
			// Redirect to landing page
			header('Location:http://localhost/Auther/PHP/examples/demo_1/index.php?logout=true');
			
		}
		
		// The getAuthenticated() method returns an array containing the currently authenticated user's information
		public function getAuthenticated() {
			
				$user_info = [];
			
				foreach($_SESSION as $name => $value) {
					
					$user_info[$name] = $value;
					
				}
				
				return $user_info;
		}
	}
?>