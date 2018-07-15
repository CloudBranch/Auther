<?php

	/**
	* @author Joshua Whalen <joshuawhalen@email.com>
	*/

	class auther {
		
		// The addUser() method adds a new user to the database table specified
		public function addUser() {
			
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